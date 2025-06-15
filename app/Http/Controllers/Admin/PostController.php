<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post; 
use Illuminate\Support\Facades\Storage; 

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255', 
            'content' => 'required|string', 
            'image' => 'nullable|image|file|max:2048',
        ]);

        $loggedInUser = Auth::user();

        $postData = $request->only('judul', 'content');
        $postData['user_id'] = $loggedInUser->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('post-images', 'public');
            $postData['image'] = $path;
        }

        Post::create($postData); 

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(Post $post)
    {
        // return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|file|max:2048'
        ]);

        $updateData = $request->only('judul', 'content');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('post-images', 'public');
            $updateData['image'] = $path;
        }

        $post->update($updateData);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil diupdate.');
    }


    public function destroy(Post $post)
    {
        // Hapus gambar terkait jika ada
        if ($post->image_path && Storage::disk('public')->exists($post->image_path)) {
            Storage::disk('public')->delete($post->image_path);
        }

        // Hapus post dari database.
        $post->delete();

        // Arahkan kembali ke halaman daftar post dengan pesan sukses.
        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
