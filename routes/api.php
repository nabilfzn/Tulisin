<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\Api\PostApiController;


//ARTIKEL
Route::get('/posts', [PostApiController::class, 'index']);         
Route::get('/posts/{id}', [PostApiController::class, 'show']);     
Route::post('/posts', [PostApiController::class, 'store']);        
Route::put('/posts/{id}', [PostApiController::class, 'update']);   
Route::delete('/posts/{id}', [PostApiController::class, 'destroy']); 


//ai
Route::prefix('articles/{post}')->group(function () {
    Route::get('summary', [AIController::class, 'getSummary']);
    Route::post('ask', [AIController::class, 'askQuestion']);
});

