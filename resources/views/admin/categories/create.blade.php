@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear nueva Categoría</h1>
@stop

@section('content')
    <div class="card m-3">
      <div clas="card-body">
        {!! Form::open(['route' => 'admin.categories.store']) !!}

          <div class= "form-group m-3">
              {{Form::label('name', 'Nombre')}}
              {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría'])}}
          </div>
          <div class= "form-group m-3">
              {{Form::label('slug', 'Slug')}}
              {{Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoría', 'readonly'])}}
          </div>

          {{ Form::submit('Crer categoría', ['class' => 'btn btn-primary m-3 ' ]) }}

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
