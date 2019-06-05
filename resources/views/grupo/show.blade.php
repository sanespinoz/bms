@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('grupo') }}">Grupos registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del grupo de luminarias</li>
  </ol>
</nav>
@section('content')
<html>
<head>
</head>
<body>
 <div align="left" class="container">    
<h2>
        Datos del grupo {{$grupo->nombre}}
    </h2>
    <br>
    <div class="form-group">
       <p>Descripción:{{$grupo->descripcion}}</p> 
       <p>Cantidad de hs. Activo:{{ $grupo->cant_hs_activo}}</p>
       <p>Cantidad de activaciones: {{ $grupo->cant_activaciones}}</p>
       <p>Cantidad de luminarias:{{ $grupo->cant_luminarias }}</p>
    </div>
    <h3>
        Luminarias en el sector
    </h3>
    <?php foreach($luminarias as $l){
             ?>
<br>
 <div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
                        Código {{ $l->codigo }}
                    </div>
                    <div class="panel-body">
                        <p>
                            Nombre: {{ $l->nombre }}
                        </p>
                        <p>
                            Tipo: {{ $l->tipo }}
                        </p>
                        <p>
                            Descripción: {{ $l->descripcion }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    <?php  }
          ?>
    <div class="form-group col-xs-12">
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
    </div>
</div>
</body>
</html>
@endsection
