<?php

use Illuminate\Support\Facades\Route;

// IMPORTAMOS CONTROLADOR A RUTA
use App\Http\Controllers\AdminHomeController;

// IMPORTAMOS CONTROLADOR CATEGORY
use App\Http\Controllers\Admin\CategoryController;

// IMPORTAMOS CONTROLADOR CATEGORY
use App\Http\Controllers\Admin\TaqController;




// CREAMOS RUTA PARA VISTA ADMIN
Route::get('', [AdminHomeController::class, 'index'])->name('admin.home');

// CREAMOS RUTAS RESOURCE CATEGORIES
Route::resource('categories', CategoryController::class)->names('admin.categories');

// CREAMOS RUTAS RESOURCE CATEGORIES
Route::resource('taqs', TaqController::class)->names('admin.taqs');
