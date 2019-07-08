@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('sector') }}">Sectores registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del sector</li>
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
    <h2>Datos del sector {{$sector->nombre}}</h2>
<br>
</div>

<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <p><strong>Descripción:</strong> {{$sector->descripcion}}</p>
        <p><strong>Piso:</strong> {{$sector->piso->nombre}}</p>
        <p><strong>Cantidad de personas:</strong> {{$sector->cant_personas}}</p>
    </div>
    <br>
   
     <?php
            if (isset($grupos)) 
            {
             ?>
    <h4>
        Grupos en el sector
    </h4>
    <?php foreach($grupos as $grupo){
             ?>
<br>
<div align="left" class="container-fluid">
 <div class="row">
  <div class="form-group">
    <div class="panel panel-default">
        <div class="panel-heading">
                       <strong>Nombre: {{$grupo->nombre}}</strong> 
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong> Descripción:</strong> {{$grupo->descripcion}}
                        </p>
                        <p>
                            <strong>Cantidad de luminarias:</strong> {{$grupo->cant_luminarias}}
                        </p>
                                                <p>
                            <strong>Energía consumida:</strong> {{$grupo->energia_consumida}}
                        </p>

                    </div>
                </div>
  </div>
  </div>
</div>
    <?php  }
  }else echo "<h4><strong>No se registran Grupos para el Sector</strong></h4>";
          ?>
<br>
<br>
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

</div>
</div>
</body>
</html>
@endsection
