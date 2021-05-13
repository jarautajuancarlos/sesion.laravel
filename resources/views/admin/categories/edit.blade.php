@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Actualizar Categoría</h1>
@stop

@section('content')

@if (session('info'))
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <strong>
      {{session('info')}}
    </strong>
  </div>
@endif

<div class="card m-3">
  <div clas="card-body">
    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'PUT']) !!}

      <div class= "form-group m-3">
          {{Form::label('name', 'Nombre')}}
          {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría'])}}

          <!-- ERRORES DE VALIDACIÓN -->
          @error('name')
            <span class="text-danger">
              {{$message}}
            </span>
          @enderror

      </div>
      <div class= "form-group m-3">
          {{Form::label('slug', 'Slug')}}
          {{Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoría', 'readonly'])}}

          <!-- ERRORES DE VALIDACIÓN -->
          @error('slug')
            <span class="text-danger">
              {{$message}}
            </span>
          @enderror

      </div>

      {{ Form::submit('Actualizar categoría', ['class' => 'btn btn-primary m-3 ' ]) }}

    {!! Form::close() !!}
  </div>
</div>
@stop

@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
  $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
  </script>

@endsection
