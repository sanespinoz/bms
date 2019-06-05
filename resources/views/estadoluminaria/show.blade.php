@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias instaladas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Estado de la Luminaria</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
 <div align="left" class="container"> 
    <h2>
        Estado de la luminaria {{ $lumi->nombre }}
    </h2>
</div>
<br>
<div>
<ul>
    <li>Fecha : {{$estado->fecha}}</li>
    <li>Estado: {{$estado->estado}}</li>
    <li>Observación: {{$estado->observacion}}</li>
</ul>
<br>
<div class="form-group">
    {!!link_to_route('estadoluminaria.edit', $title = 'Editar', $parameters = $estado->id, $attributes = ['class'=>'btn btn-primary'])!!} 
    {!!link_to_route('estadoluminaria.estados_prev', $title = 'Ver estados previos', $parameters = $lumi->id, $attributes = ['class'=>'btn btn-primary'])!!}   
</div>
</div>
</body>
</html>
@endsection

