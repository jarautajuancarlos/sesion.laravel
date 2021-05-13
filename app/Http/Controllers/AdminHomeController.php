<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    // CREAMOS METODO INDEX

    public function index(){
      return view('admin.index');
    }
}
