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
    <br>
    <h2>
        Datos del Edificio {{$edificio->nombre}}
    </h2>
        <br>
    <p>
        Descripción:
        {{$edificio->descripcion}}
    </p>
    <p>
        Dirección:
        {{$edificio->direccion}}
    </p>
    <p>
        Email:
        {{$edificio->email}}
    </p>
    <p>
        Provincia:
        {{$edificio->provincia}}
    </p>
    <p>
        Ciudad:
        {{$edificio->ciudad}}
    </p>
    <p>
        Código Postal:
        {{$edificio->codigo}}
        <h3>
            Consta de los siguientes Pisos
        </h3>
        <br>

        <?php foreach($pisos as $piso){ ?>
 <div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
                <div class="panel-heading">
                            {{$piso->nombre}}
                        </div>
                        <div class="panel-body">
                            <p>
                                Descripción: {{$piso->descripcion}}
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

