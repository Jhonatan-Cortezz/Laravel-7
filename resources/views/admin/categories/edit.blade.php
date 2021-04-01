@extends('layouts.admin')
@section('title', 'Editar categoria')
@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{route('categories.index')}}">Categorias</a>
  </li>
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Editar categoria</h3>
    </div>

    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT', 'files'=>true]) !!}
      <div class="card-body">
        @include('admin.categories.form.form')
      </div>
      <div class="card-footer">
        <a class="btn btn-danger float-right" href="{{route('categories.index')}}">Cancelar</a>
        <input type="submit" value="Actualizar" class="btn btn-primary">
      </div>
    {!! Form::close() !!} 
  </div>
@endsection