@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">
        {!! Form::open(['route' => 'admin.taqs.store']) !!}
          <div class="form-group">
            {{Form::label('name', 'Nombre')}}
            {{Form::text('name', null, ['class' => 'form-control',
             'placeholder' => 'Ingrese el nombre de la etiqueta'])}}

             @error('name')
               <small class="text-danger">{{$message}}</small>
             @enderror

          </div>
          <div class="form-group">
            {{Form::label('slug', 'Slug')}}
            {{Form::text('slug', null, ['class' => 'form-control',
             'placeholder' => 'Ingrese el slug de la etiqueta', 'readonly'])}}

              @error('slug')
                <small class="text-danger">{{$message}}</small>
              @enderror

          </div>
          <div class="form-group">
            {{Form::label('color', 'Color')}}
            {{Form::select('color', $colors, null, ['class' => 'form-control'])}}

            @error('color')
              <small class="text-danger">{{$message}}</small>
            @enderror

          </div>
          {{Form::submit('Crear etiqueta', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}

      </div>
    </div>
@stop
















@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
