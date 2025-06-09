<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return response()->json([
            'success' => true,
            'message' => 'List semua post',
            'data' => $posts
        ]);
    }

    public function userPosts()
    {
        $user = Auth::user();
        $posts = Post::with('user')->where('user_id', $user->id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Post milik user login',
            'data' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();

        $post = Post::create([
            'judul' => $request->judul,
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dibuat',
            'data' => $post
        ], 201);
    }

    public function show($id)
    {
        $post = Post::with('user')->find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail post',
            'data' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only('judul', 'content'));

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil diupdate',
            'data' => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post tidak ditemukan',
            ], 404);
        }

        if (Auth::id() !== $post->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak punya izin untuk menghapus',
            ], 403);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post berhasil dihapus'
        ]);
    }
}
