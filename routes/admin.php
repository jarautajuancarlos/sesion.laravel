<?php

use Illuminate\Support\Facades\Route;

// IMPORTAMOS CONTROLADOR A RUTA
use App\Http\Controllers\AdminHomeController;

// IMPORTAMOS CONTROLADOR CATEGORY
use App\Http\Controllers\Admin\CategoryController;

// IMPORTAMOS CONTROLADOR CATEGORY
use App\Http\Controllers\Admin\TaqController;

// IMPORTAMOS CONTROLADOR Post
use App\Http\Controllers\Admin\PostController;

// IMPORTAMOS CONTROLADOR User
use App\Http\Controllers\Admin\UserController;

// IMPORTAMOS CONTROLADOR ROLE
use App\Http\Controllers\Admin\RoleController;




// CREAMOS RUTA PARA VISTA ADMIN
Route::get('', [AdminHomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// CREAMOS RUTAS PERMISOS USUARIOS
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

// CREAMOS RUTAS PERMISOS USUARIOS ROLES
Route::resource('roles', RoleController::class)->names('admin.roles');

// CREAMOS RUTAS RESOURCE CATEGORIES
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

// CREAMOS RUTAS RESOURCE TAQS
Route::resource('taqs', TaqController::class)->except('show')->names('admin.taqs');

// CREAMOS RUTAS RESOURCE POST
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
