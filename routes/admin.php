<?php

use Illuminate\Support\Facades\Route;

// IMPORTAMOS CONTROLADOR A RUTA
use App\Http\Controllers\AdminHomeController;

// CREAMOS RUTA PARA VISTA ADMIN
Route::get('', [AdminHomeController::class, 'index'])->name('admin.home');
