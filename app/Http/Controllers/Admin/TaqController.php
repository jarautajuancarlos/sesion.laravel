<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// IMPORTAMOS MODELO TAQ
use App\Models\Taq;


class TaqController extends Controller
{

  public function __construct(){

    $this->middleware('can:admin.taqs.index')->only('index');
    $this->middleware('can:admin.taqs.create')->only('create', 'store');
    $this->middleware('can:admin.taqs.edit')->only('edit', 'update');
    $this->middleware('can:admin.taqs.index')->only('destroy');

  }

    public function index()
    {
        $taqs = Taq::all();
        return view('admin.taqs.index', compact('taqs'));
    }

    public function create()
    {
        $colors = [
          'red' => 'Color rojo',
          'yellow' => 'Color amarillo',
          'green' => 'Color verde',
          'blue' => 'Color azul',
          'indigo' => 'Color indigo',
          'purple' => 'Color morado',
          'pink' => 'Color rosado'
        ];

        return view('admin.taqs.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'slug' => 'required|unique:taqs',
          'color' => 'required'
        ]);

        $taq = Taq::create($request->all());

        return redirect()->route('admin.taqs.edit', compact('taq'))->with('info', 'La etiqueta se creó con éxito');
    }

    public function edit( Taq $taq)
    {
      $colors = [
        'red' => 'Color rojo',
        'yellow' => 'Color amarillo',
        'green' => 'Color verde',
        'blue' => 'Color azul',
        'indigo' => 'Color indigo',
        'purple' => 'Color morado',
        'pink' => 'Color rosado'
      ];

        return view('admin.taqs.edit', compact('taq', 'colors'));
    }

    public function update(Request $request,  Taq $taq)
    {
      $request->validate([
        'name' => 'required',
        'slug' => "required|unique:taqs,slug,$taq->id",
        'color' => 'required'
      ]);

      $taq->update($request->all());

      return redirect()->route('admin.taqs.edit', $taq)->with('info', 'La etiqueta se actualizó con éxito');
    }

    public function destroy( Taq $taq)
    {
        $taq->delete();

        return redirect()->route('admin.taqs.index')->with('info', 'La etiqueta se eliminó con éxito');
    }
}
