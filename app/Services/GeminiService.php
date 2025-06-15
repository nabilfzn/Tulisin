<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception; 

class GeminiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
        $this->baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=';
    }

    /**
     * Fungsi utama untuk mengirim prompt ke Gemini dan mendapatkan konten.
     *
     * @param string $prompt Perintah yang akan dikirim ke AI.
     * @return string Jawaban dari AI atau pesan kesalahan.
     */
    public function generateContent(string $prompt)
    {
        try {
            $response = Http::timeout(30)->post($this->baseUrl . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 1.0,      
                    'maxOutputTokens' => 8192,
                ],
            ]);

            if ($response->successful()) {
                return $response->json('candidates.0.content.parts.0.text') ?? 'Tidak ada jawaban yang dihasilkan.';
            }

            return 'Maaf, terjadi kesalahan saat menghubungi Gemini API. Status: ' . $response->status();

        } catch (Exception $e) {
            return 'Maaf, terjadi kesalahan tak terduga: ' . $e->getMessage();
        }
    }
}