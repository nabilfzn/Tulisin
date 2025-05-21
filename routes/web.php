<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::find($id);
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'name' => 'Nabil Fauzan']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

