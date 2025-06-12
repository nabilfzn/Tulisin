<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

//LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin')->middleware('guest');

//REGISTER
Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');


//LOGOUT
Route::get('logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//HOME
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//ARTICLE
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('/posts/{post}', function (Post $post) {
        return view('artikel.post', ['title' => 'Single Post', 'post' => $post]);
})->middleware('auth');

//ABOUT
Route::get('/about', function () {
    return view('about', ['title' => 'About', 'name' => 'Nabil Fauzan']);
})->middleware('auth');

//CONTACT
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
})->middleware('auth');

//PROFILE
Route::get('/profile', [PostController::class, 'postId'])
    ->name('profile')
    ->middleware('auth');

// Route untuk memproses update profil (form di halaman profile akan POST ke sini)
Route::patch('/profile', [UserController::class, 'update'])->name('profile.update')->middleware('auth');


// ADMIN
Route::get('/admin', [DashboardController::class, 'index'])->middleware('admin');

