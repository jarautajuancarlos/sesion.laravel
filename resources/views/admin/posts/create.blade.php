@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
      <div class="card-body">

        {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

        {!! Form::hidden('user_id', auth()->user()->id)!!}

        @include('admin.posts.partials.form')

        {!! Form::submit('Crear Post', ['class' => 'btn btn-primary' ]) !!}


        {!! Form::close() !!}
        
      </div>
    </div>
@stop
