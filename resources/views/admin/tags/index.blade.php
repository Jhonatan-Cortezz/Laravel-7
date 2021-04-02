@extends('layouts.admin')
@section('title', 'Gestion de tags')
@section('breadcrumb')
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Sección de tags</h3>

    <div class="d-flex flex-row-reverse">
      <a href="{{route('tags.create')}}" class="btn btn-primary">Agregar</a>
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
            <th style="width: 5%">
              ID
            </th>
            <th style="width: 50%">
              Nombre
            </th>
            <th style="width: 15%">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <th scope="row">{{$tag->id}}</th>
              <td>
                <a href="{{route('tags.show',$tag)}}">{{$tag->name}}</a>
              </td>
              {{-- <td>{{getModulesArray()[$tag->module]}}</td> --}}
              <td style="width: 50px;">
                {!! Form::open(['route'=>['tags.destroy',$tag], 'method'=>'DELETE']) !!}

                <a href="{{route('tags.edit', $tag)}}" title="Editar">
                  <i class="fas fa-pen-square"></i>
                </a>
                
                <button class="border-0 bg-transparent" type="submit" title="Eliminar">
                  <i class="fas fa-trash-alt text-red"></i>
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