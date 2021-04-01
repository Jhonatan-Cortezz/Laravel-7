@extends('layouts.admin')
@section('title', 'Crear categoría')
@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{route('categories.index')}}">Categorias</a>
  </li>
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Registro de categorias</h3>
    </div>
    {!! Form::open(['route'=>'categories.store', 'method'=>'post', 'files' => true]) !!}
      <div class="card-body">
        @include('admin.categories.form.form')
      </div>

      <div class="card-footer">
        <a class="btn btn-danger float-right" href="{{route('categories.index')}}">Cancelar</a>
        <input type="submit" value="Guardar" class="btn btn-primary">
      </div>

    {!! Form::close() !!}
  </div>
@endsection