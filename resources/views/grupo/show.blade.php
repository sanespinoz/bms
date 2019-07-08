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
<div class="container-fluid">
<br>
<h2>Datos del grupo {{$grupo->nombre}}</h2>
<br>
</div>

<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
       <p><strong>Descripción:</strong> {{$grupo->descripcion}}</p> 
       <p><strong>Cantidad de hs. Activo:</strong> {{ $grupo->cant_hs_activo}}</p>
       <p><strong>Cantidad de activaciones:</strong> {{ $grupo->cant_activaciones}}</p>
       <p><strong>Cantidad de luminarias:</strong> {{ $grupo->cant_luminarias }}</p>
    </div>
    <br>
   
     <?php
            if(isset($luminarias)) 
            {
             ?>
         <h4>Luminarias en el sector
        </h4>
    <?php foreach($luminarias as $l){
             ?>
<br>
<div align="left" class="container-fluid">
 <div class="row">
  <div class="form-group">
    <div class="panel panel-default">
        <div class="panel-heading">
                       <strong>Código {{ $l->codigo }}</strong> 
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>Nombre:</strong>  {{ $l->nombre }}
                        </p>
                        <p>
                            <strong>Tipo:</strong>  {{ $l->tipo }}
                        </p>
                        <p>
                           <strong>Descripción:</strong>  {{ $l->descripcion }}
                        </p>

                    </div>
    </div>
  </div>
  </div>
  </div>
    <?php  }
  }else echo "<h4><strong>No se registran luminarias para el grupo</strong></h4>";
          ?>
<br>
<br>
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}


</div>
</div>
</body>
</html>
@endsection
