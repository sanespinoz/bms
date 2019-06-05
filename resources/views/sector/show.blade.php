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
    <h2>Datos del sector {{$sector->nombre}}</h2>

    <div class="form-group">
        <p>Descripción:{{$sector->descripcion}}</p>
        <p>Piso:{{$sector->piso->nombre}}</p>
    </div>
    <h3>
        Grupos en el sector
    </h3>
    <?php foreach($grupos as $grupo){
             ?>

 <div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
                        Nombre: {{$grupo->nombre}}
                    </div>
                    <div class="panel-body">
                        <p>
                            Descripción: {{$grupo->descripcion}}
                        </p>
                        <p>
                            Cantidad de Luminarias: {{$grupo->cant_luminarias}}
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
