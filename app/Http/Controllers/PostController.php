<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAMOS MODELO POST
use App\Models\Post;

class PostController extends Controller
{
    //CREAMOS METODO INDEX
    public function index(){

      $posts = Post::where('status', 2)->latest('id')->paginate(8);

      return view('posts.index', compact('posts'));
    }

    // CREAMOS METODO SHOW
    public function show(Post $post){
      return $post;
    }
}
