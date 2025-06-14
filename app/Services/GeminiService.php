<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException; // Import untuk menangkap RequestException

class GeminiService
{
    protected $apiKey;
    protected $baseUrl;
    protected $maxRetries = 3; // Jumlah maksimum percobaan ulang
    protected $retryDelay = 1000; // Jeda awal dalam milidetik (1 detik)

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
        // Gunakan Gemini 1.5 Pro atau model lain yang sesuai
        $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=';
        // Atau jika Anda ingin menggunakan model yang lebih cepat dan mungkin lebih murah (sesuai ketersediaan dan kebutuhan):
        // $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=';
    }

    public function generateContent(string $prompt)
    {
        $attempts = 0;
        $currentDelay = $this->retryDelay;

        while ($attempts < $this->maxRetries) {
            try {
                $response = Http::timeout(30) // Tambahkan timeout yang lebih lama (30 detik)
                                ->post($this->baseUrl . $this->apiKey, [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ],
                    'safetySettings' => [
                        [
                            'category' => 'HARM_CATEGORY_HARASSMENT',
                            'threshold' => 'BLOCK_NONE'
                        ],
                        [
                            'category' => 'HARM_CATEGORY_HATE_SPEECH',
                            'threshold' => 'BLOCK_NONE'
                        ],
                        [
                            'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
                            'threshold' => 'BLOCK_NONE'
                        ],
                        [
                            'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
                            'threshold' => 'BLOCK_NONE'
                        ],
                    ],
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'maxOutputTokens' => 1000,
                    ],
                ]);

                if ($response->successful()) {
                    $candidates = $response->json('candidates');
                    if (!empty($candidates) && isset($candidates[0]['content']['parts'][0]['text'])) {
                        return $candidates[0]['content']['parts'][0]['text'];
                    }
                    return 'Tidak ada konten yang dihasilkan.';
                } elseif ($response->status() === 429) {
                    \Log::warning('Gemini API Rate Limit Hit (429). Retrying in ' . ($currentDelay / 1000) . ' seconds. Attempt ' . ($attempts + 1));
                    sleep($currentDelay / 1000); // Jeda dalam detik
                    $currentDelay *= 2; // Gandakan jeda untuk percobaan berikutnya (exponential backoff)
                    $attempts++;
                    continue; // Lanjutkan ke percobaan berikutnya
                } else {
                    \Log::error('Gemini API Error: ' . $response->status() . ' - ' . $response->body());
                    return 'Maaf, terjadi kesalahan saat menghubungi Gemini API. (' . $response->status() . ')';
                }
            } catch (RequestException $e) { // Tangkap HTTP client exceptions
                if ($e->response && $e->response->status() === 429) {
                    \Log::warning('Gemini API Rate Limit Hit (429) during HTTP client exception. Retrying in ' . ($currentDelay / 1000) . ' seconds. Attempt ' . ($attempts + 1));
                    sleep($currentDelay / 1000);
                    $currentDelay *= 2;
                    $attempts++;
                    continue;
                }
                \Log::error('Gemini API HTTP Exception: ' . $e->getMessage());
                return 'Maaf, terjadi kesalahan HTTP tak terduga: ' . $e->getMessage();
            } catch (\Exception $e) { // Tangkap exceptions lainnya
                \Log::error('Gemini API General Exception: ' . $e->getMessage());
                return 'Maaf, terjadi kesalahan tak terduga: ' . $e->getMessage();
            }
        }

        \Log::error('Gemini API: Max retries reached after ' . $this->maxRetries . ' attempts.');
        return 'Maaf, Gemini API tidak dapat dihubungi setelah beberapa kali percobaan. Silakan coba lagi nanti.';
    }
}
