<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// IMPORTAMOS MODELO POST
use App\Models\Post;
use App\Models\Category;
use App\Models\Taq;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
  public function __construct(){

    $this->middleware('can:admin.posts.index')->only('index');
    $this->middleware('can:admin.posts.create')->only('create', 'store');
    $this->middleware('can:admin.posts.edit')->only('edit', 'update');
    $this->middleware('can:admin.posts.index')->only('destroy');

  }
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $taqs = Taq::all();

        return view('admin.posts.create', compact('categories', 'taqs'));
    }

    public function store(PostRequest $request)
    {
        // return Storage::put('posts', $request->file('file'));

        $post = Post::create($request->all());

        if($request->file('file')){
          $url = Storage::put('posts', $request->file('file'));

          $post->image()->create([
            'url' => $url
          ]);
        }

        if($request->taqs){
          $post->taqs()->attach($request->taqs);
        }

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {

      $this->authorize('author', $post);

      $categories = Category::pluck('name', 'id');
      $taqs = Taq::all();

        return view('admin.posts.edit', compact('post', 'categories', 'taqs'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if ($request->file('file')){

          $url = Storage::put('posts', $request->file('file'));

          if($post->image){
            Storage::delete($post->image->url);

            $post->image->update([
              'url' => $url
              ]);
          }else{
            $post->image()->create([
              'url' => $url
            ]);
          }
        }

        if($request->taqs){
          $post->taqs()->sync($request->taqs);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();

        return redirect()->route('admin.posts.index', $post)->with('info', 'El post se eliminó con éxito');
    }















}
