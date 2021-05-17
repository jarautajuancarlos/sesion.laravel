<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// IMPORTAMOS MODELO CATEGORY
use App\Models\Category;

class CategoryController extends Controller
{

  public function __construct(){

    $this->middleware('can:admin.categories.index')->only('index');
    $this->middleware('can:admin.categories.create')->only('create', 'store');
    $this->middleware('can:admin.categories.edit')->only('edit', 'update');
    $this->middleware('can:admin.categories.index')->only('destroy');

  }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
          return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // REGLAS DE VALIDACIÓN
        $request->validate([
          'name' => 'required',
          'slug' => 'required|unique:categories'
        ]);

        // NUEVO REGISTRO DE CATEGORIA
        $category= Category::create($request->all());
        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se creó con éxito');
    }

    public function edit(Category $category)
    {
          return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
      // REGLAS DE VALIDACIÓN
      $request->validate([
        'name' => 'required',
        'slug' => "required|unique:categories,slug,$category->id"
      ]);

      $category->update($request->all());

      return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se actualizo con éxito');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó con éxito');;
    }
}
