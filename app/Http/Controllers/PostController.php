<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::all()
        ]);
    }

    public function show(Post $post) 
    {
    
        return view('artikel.post', [
            'post' => $post, 
        ]);
    }

    public function postId() 
    {
        $loggedInUser = Auth::user();

        $userPosts = Post::where('user_id', $loggedInUser->id)->get();

        return view('profile', [ 
            'posts' => $userPosts,
            'loggedInUser' => $loggedInUser 
        ]);
    }

    public function create()
    {
        $loggedInUser = Auth::user();
        $authorName = $loggedInUser->name;

        return view('artikel.create', compact('authorName'));
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

        return redirect()->route('profile')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('artikel.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|file|max:2048'
        ]);

        $updateData = $request->only('judul', 'content');

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('post-images', 'public');
            $updateData['image'] = $path;
        }

        $post->update($updateData);

        return redirect()->route('profile')->with('success', 'Artikel berhasil diupdate.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus artikel ini.');
        }

        // hapus gambar jika ada
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete(); 
        return redirect()->route('profile')->with('success', 'Artikel berhasil dihapus.'); 
    }
}
