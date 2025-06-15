<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Services\GeminiService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class AIController extends Controller
{
    /**
     * @var GeminiService Instance dari layanan Gemini.
     */
    protected $geminiService;

    /**
     * Constructor untuk AIController.
     * Menginject GeminiService ke dalam controller.
     *
     * @param GeminiService
     */
    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    /**
     * Mengambil ringkasan artikel menggunakan Gemini API.
     *
     * @param Request $request Objek permintaan HTTP.
     * @param Post $post Model Post yang terikat dengan ID di URL.
     * @return JsonResponse Respon JSON berisi ringkasan atau pesan kesalahan.
     */
    public function askQuestion(Request $request, Post $post): JsonResponse
    {
        $request->validate([
            'question' => 'required|string|max:500'
        ]);

        $articleContent = $post->content;
        $question = $request->input('question');

        if (empty($articleContent)) {
            return response()->json(['error' => 'Konten artikel tidak ditemukan.'], 404);
        }

        $prompt = "Berdasarkan artikel berikut, jawab pertanyaan ini:\n\nArtikel:\n\"\"\"\n" . $articleContent . "\n\"\"\"\n\nPertanyaan:\n\"\"\"\n" . $question . "\n\"\"\"\n\nJawaban:";

        $answer = $this->geminiService->generateContent($prompt);

        return response()->json(['answer' => $answer]);
    }
}
