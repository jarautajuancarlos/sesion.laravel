<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAMOS MODELO POST
use App\Models\Post;

class PostController extends Controller
{
    //CREAMOS METODO INDEX
    public function index(){

      $posts = Post::where('status', 2)->get();

      return view('posts.index', compact('posts'));
    }
}
