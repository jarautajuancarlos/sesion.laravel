<?php

use Illuminate\Support\Facades\Route;

// CREAMOS RUTA PARA VISTA ADMIN
Route::get('admin', function (){
  return ('Hola Admin');
});
