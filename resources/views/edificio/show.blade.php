@extends('layouts.admin')
@section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del Edificio {{$edificio->nombre}}
    </h2>
    <div class="form-group">
        Descripción:
        {{$edificio->descripcion}}
    </div>
    <div class="form-group">
        Dirección:
        {{$edificio->direccion}}
    </div>
    <div class="form-group">
        Email:
        {{$edificio->email}}
    </div>
    <div class="form-group">
        Provincia:
        {{$edificio->provincia}}
    </div>
    <div class="form-group">
        Ciudad:
        {{$edificio->ciudad}}
    </div>
    <div class="form-group">
        Código Postal:
        {{$edificio->codigo}}
    </div>
    <h3>
        Consta de los siguientes pisos:
    </h3>
    <?php foreach($pisos as $piso){ ?>
    <ul>
        {{$piso->nombre}}: {{$piso->descripcion}}
    </ul>
    <?php  }
        ?>
    @endsection
</div>