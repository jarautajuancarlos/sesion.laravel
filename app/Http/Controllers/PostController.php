<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// IMPORTAMOS MODELO POST
use App\Models\Post;

// IMPORTAMOS MODELO CARTEGORY
use App\Models\Category;

// IMPORTAMOS MODELO TAQ
use App\Models\Taq;



class PostController extends Controller
{
    //CREAMOS METODO INDEX
    public function index(){

      $posts = Post::where('status', 2)->latest('id')->paginate(8);

      return view('posts.index', compact('posts'));
    }

    // CREAMOS METODO SHOW
    public function show(Post $post){

      // BUSCAMOS LOS POST RELACIONADOS POR TAQS
      $similares = Post::where('category_id', $post->category_id)
                        ->where('status', 2)
                        ->where('id', '!=', $post->id)
                        ->latest('id')
                        ->take(4)
                        ->get();

      return view('posts.show', compact('post', 'similares'));
    }

    // CREAMOS METODO CATEGORY
    public function category(Category $category){
      $posts = Post::where('category_id', $category->id)
                      ->where('status', 2)
                      ->latest('id')
                      ->paginate(4);

      return view('posts.category', compact('posts', 'category'));

    }

      // CREAMOS METODO PARA TAQ
      public function taq(Taq $taq){
        $posts = $taq->posts()->where('status', 2)->latest('id')->paginate(4);

        return view('posts.taq', compact('posts', 'taq'));
      }



















}
