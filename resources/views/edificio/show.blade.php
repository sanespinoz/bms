@extends('layouts.admin')

<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio registrado</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del edificio</li>
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
       <h2> Datos del Edificio {{$edificio->nombre}}
    </h2>
<br>
</div>

<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
       <p><strong>Descripción:</strong> {{$edificio->descripcion}}</p>
       <p><strong>Dirección:</strong> {{$edificio->direccion}}</p>
        <p><strong>Email:</strong> {{$edificio->email}}</p>
        <p><strong>Provincia:</strong> {{$edificio->provincia}}</p>
        <p><strong>Ciudad:</strong> {{$edificio->ciudad}}</p>
        <p><strong>Código Postal:</strong> {{$edificio->codigo}}</p>
        </div>
    <br>
   
     <?php
            if(isset($pisos)) 
            {
             ?>
         <h4>Pisos en el edificio</h4>
    <?php foreach($pisos as $piso){
             ?>
<br>
<div align="left" class="container-fluid">
 <div class="row">
  <div class="form-group">
    <div class="panel panel-default">
        <div class="panel-heading">
                    <strong>
                            {{$piso->nombre}}</strong> 
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>Descripción:</strong> {{$piso->descripcion}}
                            </p>

                </div>
                </div>
            </div>
        </div>
        </div>
    <?php  }
  }else echo "<h4><strong>No se registran pisos para el edificio</strong></h4>";
          ?>
<br>
<br>
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

</div>
</div>
</body>
</html>
@endsection

