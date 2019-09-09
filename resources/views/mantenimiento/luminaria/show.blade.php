@extends('layouts.mantenimiento')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item">Edificio {{ $nombre }}</li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias registradas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información de la luminaria</li>
</ol>
</nav>
@section('content')
<html>
<head>
</head>
<body>
   <div align="left" class="container">
    <div class="container-fluid">
        <br>
        <h2>Datos de la luminaria {{$l->nombre}}</h2>
        <br>
    </div>

    <div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
         <p><strong>Luminaria:</strong> {{ $l->codigo }}</p>
         <p><strong>Piso:</strong> {{ $p->nombre}}</p>
         <p><strong>Sector:</strong> {{ $s->nombre }}</p>
         <p><strong>Grupo:</strong> {{ $g->nombre }}</p>
         <p><strong>Tipo:</strong> {{ $l->tipo }}</p>
         <p><strong>Descripción:</strong> {{ $l->descripcion }}</p>
         <p><strong>Dimensiones:</strong> {{ $l->dimensiones }}</p>
         <p><strong>Voltaje Nominal:</strong> {{ $l->voltaje_nominal }}</p>
         <p><strong>Potencia Nominal:</strong> {{ $l->potencia_nominal }}</p>
         <p><strong>Corriente Nominal:</strong> {{ $l->corriente_nominal }}</p>
         <p><strong>Fecha de Instalación:</strong> {{ $l->fecha_alta }}</p>
         <p>
            @if ($l->fecha_baja) <strong>Fecha de Desinstalación:</strong> {{ $l->fecha_baja }}
            @endif
        </p>
        <p><strong>Vida Útil:</strong> {{ $l->vida_util }}
        </p>
        <p>
            <?php if($estado_lum == 0)
            { ?>
            <strong>Estado Actual:</strong> Inactiva
            
            <?php }elseif($estado_lum == 1){ ?>
            <strong>Estado Actual:</strong> Activa

            <?php }elseif ($estado_lum == 2)
            { ?>
            <strong>Estado Actual:</strong> Fallo
            
            <?php }else{ ?>
            <strong>Estado Actual:</strong> Mantenimiento
            
            <?php } ?>
        </p>
    </div>
    <br>
    <br>
    {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

</div>
</div>
</body>
</html>
@endsection
