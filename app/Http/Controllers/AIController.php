<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Services\GeminiService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class AIController extends Controller
{

public function askQuestion(Request $request, Post $post): JsonResponse
    {
        $articleContent = $post->content;
        $question = $request->input('question');

        if (empty($articleContent)) {
            return response()->json(['error' => 'Konten tidak ditemukan.'], 404);
        }

        $prompt = "Berdasarkan artikel berikut, jawab pertanyaan ini:\n\nArtikel:\n\"\"\"\n{$articleContent}\n\"\"\"\n\nPertanyaan:\n\"\"\"\n{$question}\n\"\"\"\n\nJawaban:";

        $geminiService = new GeminiService();  
        $answer = $geminiService->generateContent($prompt);

        return response()->json(['jawaban' => $answer]);
    }

}

