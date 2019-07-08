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
    <li class="breadcrumb-item active" aria-current="page">Pisos registrados</li>
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
    Pisos Registrados
</h2>
</div>
<br>

<div class="container-fluid col-sm-6 col-md-6 col-lg-8">
    <div class="input-group" role="menu">
    <!--Buscador de sectores -->
    {!! Form::open(['route'=>'pisos.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
    {!! csrf_field() !!}
        <div class="form-group">
        <select  class="form-control" name="piso" id="piso_id">            
            <option selected="selected" value=""> Seleccione el Piso
                    </option>
            @foreach($pisos as $piso){
                <option value="{{ $piso->id }}">{{ $piso->nombre }} </option>
                                        } 
            @endforeach
        </select>
        
                <button class="form-control btn btn-primary" type="submit">
                 Buscar
                </button>
                </div>
                {!! Form::close() !!}
    </div>

<br>
    <!-- contenido principal -->
<section class="resultados" id="resultados">
    <table class="table table-bordered table-striped">
            <head>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </head>
            <tbody>
                @foreach($pisos as $piso)
                <tr>
                    <td>
                    <a href="{{ route('pisos.show', $piso->id) }}">
                        {{$piso->nombre}}
                    </a>
                    </td>
                    <td>
                        {{ $piso->descripcion }}
                    </td>
                    <td>
                        {!!link_to_route('pisos.edit', $title = 'Editar', $parameters = $piso->id, $attributes = ['class'=>'btn btn-primary'])!!}
                        {!!link_to_route('pisos.eliminar', $title = 'Eliminar', $parameters = $piso->id, $attributes = ['class'=>'btn btn-danger'])!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $pisos->render() !!}        

    </section>
</div>
</div>
</body>
</html>
@endsection
