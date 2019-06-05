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
    <li class="breadcrumb-item active" aria-current="page">Luminarias</li>
  </ol>
</nav>
@section('content')
<html>
<head>
</head>
<body>
<div align="left" class="container">
<h2>
    Luminarias Registradas
</h2>
<br>
<div class="container-fluid col-md-8">
    <div class="input-group" role="menu">
        {!! Form::open(['route'=>'luminaria.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
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
            {{-- Este listado quizas deba mostrarme algo mas util o bien dejo solo los datos especificos de la tabla luminaria y cuando view traigo los datos del piso sector y grupo y tambien lo de la tabla de estado..el valor de regulacion, para cambiar el estado link en el i y me manda a edit estado --}}
            <tr>
                <th>
                    N° de Serie
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Tipo
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
            @foreach($luminarias as $luminaria)
            <tr>
                <td>
                    <a href="{{ route('luminaria.show', $luminaria->id) }}">
                        {{$luminaria->codigo}}
                    </a>
                </td>
                <td>
                    {{ $luminaria->nombre }}
                </td>
                <td>
                    {{ $luminaria->tipo }}
                </td>
                <td>
                    @if ($luminaria->estado($luminaria->id))

                    @if ($luminaria->estado($luminaria->id)->estado  == 1)
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-check-circle ">
                            </i>
                        </div>
                    </a>
                    @elseif ($luminaria->estado($luminaria->id)->estado  == 2 )
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-exclamation-circle" style="color:#FF8C00">
                            </i>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-times-circle" style="color:#FF0000">
                            </i>
                        </div>
                    </a>
                    @endif
                    @endif
                    {{-- luminaria  llama a la funcion estado en luminaria.php y si esta activa muestra check sino x solo que me lo tiene que traer como una  collect para accederlo o un array hacer un dd dentro de la funcioon estado para ver como lo devuelve --}}
                </td>
                <td>
                    {!!link_to_route('luminaria.edit', $title = 'Editar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-primary'])!!}

                    {!!link_to_route('luminaria.eliminar', $title = 'Eliminar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-danger'])!!}

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $luminarias->render() !!}       
    </section>
</body>
</html>
@endsection
