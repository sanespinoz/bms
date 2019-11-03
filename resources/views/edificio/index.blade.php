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
    <li class="breadcrumb-item active" aria-current="page">Edificio {{ $nombre }}</li>
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
              Edificio registrado
          </h2>
      </div>
      <br>

      <div class="container-fluid col-sm-6 col-md-6 col-lg-8">
        <br>
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
                            Ciudad
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($edificios as $edificio)
                    <tr>
                        <td>
                            <a href="{{ route('edificio.show', $edificio->id) }}">
                                {{ $edificio->nombre }}
                            </a>   
                        </td>
                        <td>
                            {{ $edificio->descripcion}}
                        </td>
                        <td>
                            {{ $edificio->ciudad}}
                        </td>
                        <td>
                            {!!link_to_route('edificio.edit', $title = 'Editar', $parameters = $edificio->id, $attributes = ['class'=>'btn btn-primary'])!!}
                           {{-- {!!link_to_route('edificio.eliminar', $title = 'Eliminar', $parameters = $edificio->id, $attributes = ['class'=>'btn btn-danger'])!!} --}} 
                             <a href="{{ url('edificio/eliminar/'.$edificio->id) }}" class="btn btn-danger" onclick="return confirm('Esta seguro de perder la informacion del Edificio')"> Eliminar </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $edificios->render() !!}
        </section>
    </div>
</div>
</body>
</html>
@endsection
