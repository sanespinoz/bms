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
    <li class="breadcrumb-item active" aria-current="page">Sectores registrados</li>
  </ol>
</nav>
@section('content')
<html>
<head>
</head>
<body>
<div align="left" class="container">
<h2>
    Sectores Registrados
</h2>
<br>
    <!--Buscador de sectores <select class="form-control floating-label" name="piso">-->

<div class="container-fluid col-md-8">
    <div class="input-group" role="menu">
        {!! Form::open(['route'=>'sector.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
        {!! csrf_field() !!}
        <div class="form-group">
            <select name="piso">
            @foreach($pisos as $piso){
                <option value="{{ $piso->id }}">{{ $piso->nombre }} </option>
                                        } 
            @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::text('sector',null, ['class'=>'form-control','placeholder'=>'Buscar por Sector','aria-describedby'=>'search']) !!}
        </div>
        <button class="btn btn-primary" type="submit">
        <span aria-hidden="true" class="glyphicon glyphicon-search">BUSCAR </span>
        </button>
        {!! Form::close() !!}
    </div>
</div>
</div>
<br>
    <!-- contenido principal -->
<section class="resultados" id="resultados">
    <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Piso
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sectores as $sector)
                <tr>
                    <td>
                    <a href="{{ route('sector.show', $sector->id) }}">
                        {{ $sector->nombre }}
                    </a> 
                    </td>
                    <td>
                        {{ $sector->descripcion }}
                    </td>
                    <td>
                        {{ $sector->piso->nombre}}
                    </td>
                    <td>
                        {!!link_to_route('sector.edit', $title = 'Editar', $parameters = $sector->id, $attributes = ['class'=>'btn btn-primary'])!!}
                        {!!link_to_route('sector.eliminar', $title = 'Eliminar', $parameters = $sector->id, $attributes = ['class'=>'btn btn-danger'])!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $sectores->render() !!}     
    </section>
</body>
</html>
@endsection
