@extends('layouts.admin')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
            ×
        </span>
    </button>
    {{Session::get('message')}}
</div>
@endif
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="gestion">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
        <div align="left" class="container">
<div class="container-fluid">
<h2>
                Usuarios Registrados
            </h2>
</div>
<br>
{{-- buscador --}}


<div class="container-fluid col-sm-6 col-md-6 col-lg-8">
    <div class="input-group" role="menu">
                                {!! Form::open(['route'=>'user.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
                                {!! csrf_field() !!}
                <div class="form-group">

                    <select class="form-control" name="rol">
                        @foreach($roles as $rol){
                            <option value="{{ $rol->id }}">
                                            {{ $rol->rol }}
                            </option>
                                        } 
                        @endforeach
                    </select>
              
             
                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Nombre de usuario ','aria-describedby'=>'search']) !!}
             
                <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            
                {!! Form::close() !!}
            </div>
<br>

  <section class="resultados" id="resultados">
 @if(!$users->isEmpty())
  <div align="left" class="container">
 <p><strong>Cantidad de usuarios: {{ $users->total() }}</strong></p>
 </div>
 <br>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Correo Electrónico
                </th>
                <th>
                    Rol
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                <a href="{{ route('user.show', $user->id) }}">
                        {{ $user->name }}
                    </a>       
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->rol->rol}}
                </td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    {!!link_to_route('user.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    {!!link_to_route('user.eliminar', $title = 'Eliminar', $parameters = $user->id, $attributes = ['class'=>'btn btn-danger'])!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}
        @else <h4><strong>No se registra/n Usuario/s</strong></h4>
    @endif
    </section>

</div>
</div>
</body>
</html>
@endsection
