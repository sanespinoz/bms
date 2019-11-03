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
@if(Session::has('message1'))
<div class="alert alert-info alert-dismissible" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
            ×
        </span>
    </button>
    {{Session::get('message1')}}
</div>
@endif
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="gestion">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sectores registrados</li>
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
            Sectores registrados {{ $nombre_piso }}
            </h2>
        </div>
        <br>

        <div class="container-fluid col-sm-8 col-md-8 col-lg-10">
            <div class="input-group" role="menu">
                {!! Form::open(['route'=>'sector.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
                {!! csrf_field() !!}

                <div class="form-group">
                    <select  class="form-control" name="piso" id="piso_id">
                        <option selected="selected" value="">Seleccione el Piso
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
           @if(!$sectores->isEmpty())
           <div align="left" class="container">
               <p><strong>Cantidad de sectores: {{ $sectores->total() }}</strong></p>
           </div>
           <br>

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
                       {{-- {!!link_to_route('sector.eliminar', $title = 'Eliminar', $parameters = $sector->id, $attributes = ['class'=>'btn btn-danger'])!!} --}} 
                         <a href="{{ url('sector/eliminar/'.$sector->id) }}" class="btn btn-danger" onclick="return confirm('Esta seguro de perder la informacion del Sector')"> Eliminar </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $sectores->render() !!} 
        @else <h4><strong>No se registra/n Sector/es</strong></h4>
        @endif    
    </section>
</div>
</div>
</body>
</html>
@endsection
