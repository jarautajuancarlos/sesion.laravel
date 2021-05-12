<?php

use Illuminate\Support\Facades\Route;

// IMPORTAMOS POSTCONTROLLER
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
