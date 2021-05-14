@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')

<a class="btn btn-secondary btn-sm float-right"
  href="{{route('admin.taqs.create')}}">
  Nueva Etiqueta
</a>

    <h1>Lista de Etiquetas</h1>
@stop

@section('content')
<div class="card">
  <div class=card-body>

    <table class="table table-striped">

      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th colspan="2"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($taqs as $taq)
          <tr>
            <td>{{$taq->id}}</td>
            <td>{{$taq->name}}</td>
            <td width=10px>
              <a class="btn btn-primary btn-sm"
                href="{{route('admin.taqs.edit', $taq)}}">Editar</a>
            </td>
            <td width=10px>
              <form action="{{route('admin.taqs.destroy', $taq)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  Eliminar
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
