@extends('layouts.admin')

<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('pisos') }}">Pisos instaladas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del piso</li>
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
    <h2>Datos del piso {{$piso->nombre}}</h2>
    <br>
  </div>

  <div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
      <p><strong>Descripción:</strong> {{$piso->descripcion}}</p> 
    </div>
    <br>

    <?php
    if (isset($sectores)) 
    {
     ?>
     <h4>Sectores del piso
     </h4>
     <?php foreach($sectores as $sector){
       ?>
       <br>
       <div align="left" class="container-fluid">
         <div class="row">
          <div class="form-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>Sector: {{$sector->nombre}}</strong> 
              </div>
              <div class="panel-body">
                <p>
                  <strong>Descripción:</strong>  {{$sector->descripcion}}
                </p>
                <p>
                  <strong>Cantidad de personas:</strong>  {{$sector->cant_personas}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php  }
    } else echo "<h4><strong>No se registran sectores para el piso</strong></h4>";
    ?>
    <br>
    <br>
    {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

  </div>
</div>
</body>
</html>
@endsection
