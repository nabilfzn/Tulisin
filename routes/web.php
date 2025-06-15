<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaveController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PostController as FrontPostController;
use App\Http\Controllers\UserController as FrontUserController;


//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin')->middleware('guest');

//REGISTER
Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('/actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');


//LOGOUT
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//HOME
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

//ARTICLE
Route::get('/posts', [FrontPostController::class, 'index'])->middleware('auth');
Route::get('/posts/create', [FrontPostController::class, 'create'])->middleware('auth');
Route::post('/posts', [FrontPostController::class, 'store'])->middleware('auth');
Route::get('/posts/{id}/edit', [FrontPostController::class, 'edit'])->middleware('auth');
Route::put('/posts/{id}', [FrontPostController::class, 'update'])->middleware('auth');
Route::delete('/posts/{id}', [FrontPostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');


Route::middleware(AdminMiddleware::class)->group( function() {

});

Route::get('/posts/{post}', [FrontPostController::class, 'show']);

//ABOUT
Route::get('/about', function () {
    return view('about', ['title' => 'About', 'name' => 'Nabil Fauzan']);
})->middleware('auth');


//PROFILE
Route::get('/profile', [FrontPostController::class, 'postId'])->name('profile')->middleware('auth');
Route::patch('/profile', [FrontUserController::class, 'update'])->name('profile.update')->middleware('auth');

//Artikel Tersimpan
Route::get('/save', [SaveController::class, 'saving'])->name('saving')->middleware('auth');


// ADMIN
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin.dashboard'); 

Route::resource('admin/users', UserController::class)->names('admin.users');
Route::resource('admin/posts', PostController::class)->names('admin.posts');

// GEMINI
// Route::post('/articles/{post}/ask', [AIController::class, 'askQuestion']);
Route::post('posts/{post}/ask', [AIController::class, 'askQuestion']);



