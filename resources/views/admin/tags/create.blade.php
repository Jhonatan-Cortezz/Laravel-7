@extends('layouts.admin')
@section('title', 'Crear tag')
@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{route('tags.index')}}">Tags</a>
  </li>
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Registro de tags</h3>
    </div>
    {!! Form::open(['route'=>'tags.store', 'method'=>'post', 'files' => true]) !!}
      <div class="card-body">
        @include('admin.tags.form.form')
      </div>

      <div class="card-footer">
        <a class="btn btn-danger float-right" href="{{route('tags.index')}}">Cancelar</a>
        <input type="submit" value="Guardar" class="btn btn-primary">
      </div>

    {!! Form::close() !!}
  </div>
@endsection