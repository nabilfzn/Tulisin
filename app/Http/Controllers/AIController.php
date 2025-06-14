<?php

namespace App\Http\Controllers; // Pastikan namespace ini sudah benar sesuai lokasi file

use Illuminate\Http\Request;
use App\Services\GeminiService;
use App\Models\Post; // Asumsi model artikel Anda bernama Post
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
     * @param GeminiService $geminiService
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
    public function getSummary(Request $request, Post $post): JsonResponse
    {
        // Mendapatkan konten artikel dari model Post.
        // Pastikan 'content' adalah nama kolom yang benar untuk konten artikel Anda.
        
        $articleContent = $post->content;
        // dd($post);
        // Memeriksa apakah konten artikel tidak kosong.
        if (empty($articleContent)) {
            return response()->json(['error' => 'Konten artikel tidak ditemukan.'], 404);
        }

        // Membuat prompt untuk Gemini API untuk meringkas artikel.
        // Prompt ini menginstruksikan Gemini untuk meringkas dalam bahasa Indonesia dan memberikan poin-poin pentingnya.
        $prompt = "Ringkas artikel berikut dalam bahasa Indonesia, berikan poin-poin pentingnya:\n\n" . $articleContent;

        // Memanggil layanan Gemini untuk menghasilkan konten (ringkasan).
        $summary = $this->geminiService->generateContent($prompt);

        // Mengembalikan ringkasan dalam format JSON.
        return response()->json(['summary' => $summary]);
    }

    /**
     * Menjawab pertanyaan tentang artikel menggunakan Gemini API.
     *
     * @param Request $request Objek permintaan HTTP (harus berisi 'question').
     * @param Post $post Model Post yang terikat dengan ID di URL.
     * @return JsonResponse Respon JSON berisi jawaban atau pesan kesalahan.
     */
    public function askQuestion(Request $request, Post $post): JsonResponse
    {
        // Memvalidasi permintaan untuk memastikan 'question' ada dan sesuai format.
        $request->validate([
            'question' => 'required|string|max:500' // Pertanyaan harus string dan maksimal 500 karakter.
        ]);

        // Mendapatkan konten artikel dan pertanyaan dari input request.
        $articleContent = $post->content; // Ganti 'content' dengan nama kolom konten artikel Anda
        $question = $request->input('question');

        // Memeriksa apakah konten artikel tidak kosong.
        if (empty($articleContent)) {
            return response()->json(['error' => 'Konten artikel tidak ditemukan.'], 404);
        }

        // Membuat prompt untuk Gemini API untuk menjawab pertanyaan berdasarkan artikel.
        // Prompt ini diformat agar Gemini memahami konteks artikel dan pertanyaan.
        $prompt = "Berdasarkan artikel berikut, jawab pertanyaan ini:\n\nArtikel:\n\"\"\"\n" . $articleContent . "\n\"\"\"\n\nPertanyaan:\n\"\"\"\n" . $question . "\n\"\"\"\n\nJawaban:";

        // Memanggil layanan Gemini untuk menghasilkan konten (jawaban).
        $answer = $this->geminiService->generateContent($prompt);

        // Mengembalikan jawaban dalam format JSON.
        return response()->json(['answer' => $answer]);
    }
}
