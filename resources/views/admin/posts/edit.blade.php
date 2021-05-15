@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Editar post</h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">
        {!! Form::Model($post, ['route' => ['admin.posts.update', $post],
        'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

        @include('admin.posts.partials.form')

        {!! Form::submit('Actualizar Post', ['class' => 'btn btn-primary' ]) !!}


        {!! Form::close() !!}

      </div>
    </div>
@stop
