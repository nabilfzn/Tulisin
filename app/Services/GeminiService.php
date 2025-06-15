<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception; 

class GeminiService
{
    public function generateContent(string $prompt)
    {
        try {
            $apiKey = env('GEMINI_API_KEY');
            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $apiKey;

            $response = Http::post($url, [
                'contents' => [[
                    'parts' => [['text' => $prompt]]
                ]],
                'generationConfig' => [
                    'temperature' => 2.0,
                    'maxOutputTokens' => 10000,
                ],
            ]);

            if ($response->successful()) {
                return $response->json('candidates.0.content.parts.0.text') ?? 'Jawaban kosong.';
            }

            return 'Gagal hubungi Gemini. Status: ' . $response->status();

        } catch (\Exception $e) {
            return 'Kesalahan: ' . $e->getMessage();
        }
    }
}