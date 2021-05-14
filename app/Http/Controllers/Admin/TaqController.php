<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// IMPORTAMOS MODELO TAQ
use App\Models\Taq;


class TaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taqs = Taq::all();
        return view('admin.taqs.index', compact('taqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Taq $taq)
    {
        return view('admin.taqs.show', compact('taq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Taq $taq)
    {
        $taq->delete();

        return redirect()->route('admin.taqs.index')->with('info', 'La etiqueta se eliminó con éxito');
    }
}
