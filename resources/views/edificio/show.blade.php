@extends('layouts.admin')
@section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del piso {{$edificio->nombre}}
    </h2>
    Descripción:
        {{$edificio->descripcion}}
        Dirección:
        {{$edificio->direccion}}
        Email:
        {{$edificio->email}}
        Ciudad:
        {{$edificio->ciudad}}
        Código Postal:
        {{$edificio->codigo}}
        Provincia:
        {{$edificio->provincia}}
    <h3>
        Pisos en el edificio
    </h3>
    <?php foreach($pisos as $piso){ ?>
    <ul>
        Nombre: {{$piso->nombre}}
            Descripción: {{$piso->descripcion}}
    </ul>
    <?php  }
        ?>
</div>
@endsection
