@extends('layouts.admin')
@section('title', 'Gestion de categorías')
@section('breadcrumb')
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Sección de categorías</h3>

    <div class="d-flex flex-row-reverse">
      <a href="{{route('categories.create')}}" class="btn btn-primary">Agregar</a>
    </div>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 1%">
              ID
            </th>
            <th style="width: 20%">
              Nombre
            </th>
            <th style="width: 30%">
              Modulo
            </th>
            <th>
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <th scope="row">{{$category->id}}</th>
              <td>
                <a href="{{route('categories.show',$category)}}">{{$category->name}}</a>
              </td>
              <td>{{$category->module}}</td>
              <td style="width: 50px;">
                {!! Form::open(['route'=>['categories.destroy',$category], 'method'=>'DELETE']) !!}

                <a class="jsgrid-button jsgrid-edit-button" href="{{route('categories.edit', $category)}}" title="Editar">
                    <i class="far fa-edit"></i>
                </a>
                
                <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                    <i class="far fa-trash-alt"></i>
                </button>

                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection