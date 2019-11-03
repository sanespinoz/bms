@extends('layouts.mantenimiento')
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item">Edificio {{ $nombre }}</li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias instaladas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Estado de la luminaria</li>
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
    <h2>
      Estado de la luminaria {{$lumi->nombre}}, Código {{$lumi->codigo}}
    </h2>
    <br>
  </div>

  <div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
     <p><strong>Fecha:</strong> {{$estado->fecha}}</p>
     <p>
      <?php if($estado->estado == 0)
      { ?>
      <strong>Estado:</strong> Inactiva
      
      <?php }elseif($estado->estado == 1)
      { ?>
      <strong>Estado:</strong> Activa

      <?php }elseif($estado->estado == 2)
      { ?>
      <strong>Estado:</strong> Fallo
      
      <?php }else{ ?>
      <strong>Estado:</strong> Mantenimiento
      
      <?php } ?>
    </p>
    <p><strong>Observación:</strong> {{$estado->observacion}}</p>
  </div>
  <br>
  <br>
  <div class="form-group">
    <?php if($estado->estado == 0)
    { ?>

    {!!link_to_route('estadoluminaria.estados_prev', $title = 'Ver estados previos', $parameters = $lumi->id, $attributes = ['class'=>'btn btn-primary'])!!}   

    <?php }else{ ?>

    {!!link_to_route('estadoluminaria.edit', $title = 'Editar', $parameters = $estado->id, $attributes = ['class'=>'btn btn-primary'])!!} 
    {!!link_to_route('estadoluminaria.estados_prev', $title = 'Ver estados previos', $parameters = $lumi->id, $attributes = ['class'=>'btn btn-primary'])!!}   
    <?php } ?>

  </div>
</div>
</div>
</body>
</html>
@endsection

