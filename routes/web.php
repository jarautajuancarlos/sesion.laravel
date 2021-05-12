<?php

use Illuminate\Support\Facades\Route;

// IMPORTAMOS POSTCONTROLLER
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');

// CREAMOS RUTA PARA VER LOS DETALLES DE UN POST
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// CREAMOS RUTA PARA VER POSTS POR CATEGORIAS
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
