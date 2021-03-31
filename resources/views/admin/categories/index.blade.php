@extends('layouts.admin')
@section('title', 'Gestion de categorías')
@section('breadcrumb')
  <li class="breadcrumb-item">@yield('title')</li>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              
              <div class="d-flex justify-content-between">
                  <h4 class="card-title">Sección de categorías</h4>
                  {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                  <div class="d-flex flex-row-reverse">
                    <a href="{{route('categories.create')}}" class="bg-primary p-1">Agregar</a>
                  </div>
              </div>

              <div class="table-responsive">
                  <table id="order-listing" class="table">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              <th>Modulo</th>
                              <th>Acciones</th>
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
          </div>
          {{--  <div class="card-footer text-muted">
              {{$categories->render()}}
          </div>  --}}
      </div>
  </div>
</div>
@endsection