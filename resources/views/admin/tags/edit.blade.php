@extends('layouts.admin')
@section('title', 'Editar tag')
@section('breadcrumb')
  <li class="breadcrumb-item">
    <a href="{{route('tags.index')}}">Tags</a>
  </li>
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Editar tag</h3>
    </div>

    {!! Form::model($tag,['route'=>['tags.update',$tag], 'method'=>'PUT', 'files'=>true]) !!}
      <div class="card-body">
        @include('admin.tags.form.form')
      </div>
      <div class="card-footer">
        <a class="btn btn-danger float-right" href="{{route('tags.index')}}">Cancelar</a>
        <input type="submit" value="Actualizar" class="btn btn-primary">
      </div>
    {!! Form::close() !!} 
  </div>
@endsection