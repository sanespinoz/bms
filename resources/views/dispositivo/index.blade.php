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
    <li class="breadcrumb-item active" aria-current="page">Dispositivos registrados</li>
  </ol>
</nav>
@section('content')
<html>
<head>
</head>
<body>
<div align="left" class="container">
<h2>
    Dispositivos Registrados
</h2>
<br>
<br>
<div class="container-fluid col-md-8">
    <div class="input-group" role="menu">
        {!! Form::open(['route'=>'dispositivo.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
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
        <div class="form-group">
            {!! Form::text('grupo',null, ['class'=>'form-control','placeholder'=>'Buscar por Grupo','aria-describedby'=>'search']) !!}
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
                    Código
                </th>
                <th>
                    Tipo
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($dispositivos as $dispositivo)
            <tr>
                <td>
                     <a href="{{ route('dispositivo.show', $dispositivo->id) }}">
                        {{$dispositivo->codigo}}
                    </a>
                </td>
                <td>
                    {{ $dispositivo->tipo }}
                </td>
                <td>
                    {{ $dispositivo->nombre }}
                </td>
                <td>
                    @if ($dispositivo->estado == 'a')
                    <div class="text-center">
                        <i class="fas fa-check-circle ">
                        </i>
                    </div>
                    @elseif ($dispositivo->estado == 'f' )
                    <div class="text-center">
                        <i class="fas fa-exclamation-circle" style="color:#FF8C00">
                        </i>
                    </div>
                    @else
                    <div class="text-center">
                        <i class="fas fa-times-circle" style="color:#FF0000">
                        </i>
                    </div>
                    @endif
                </td>
                <td>
                    {!!link_to_route('dispositivo.edit', $title = 'Editar', $parameters = $dispositivo->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    {!!link_to_route('dispositivo.eliminar', $title = 'Eliminar', $parameters = $dispositivo->id, $attributes = ['class'=>'btn btn-danger'])!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $dispositivos->render() !!}     
    </section>
</body>
</html>
@endsection
