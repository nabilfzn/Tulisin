<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostApiController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/posts', [PostApiController::class, 'index']);

//ARTIKEL
Route::middleware('auth:sanctum')->group(function () {
    // Route untuk logout dan melihat data user yang sedang login
    Route::post('/logout', [AuthController::class, 'logout']);

    // Route untuk PostApiController
    Route::get('/posts/user', [PostApiController::class, 'userPosts']);
    Route::post('/posts', [PostApiController::class, 'store']); // Membuat post (butuh autentikasi)
    Route::put('/posts/{id}', [PostApiController::class, 'update']); // Update post (butuh autentikasi)
    Route::delete('/posts/{id}', [PostApiController::class, 'destroy']); // Hapus post (butuh autentikasi)
});

//ai
Route::prefix('articles/{post}')->group(function () {
    Route::get('summary', [AIController::class, 'getSummary']);
    Route::post('ask', [AIController::class, 'askQuestion']);
});

