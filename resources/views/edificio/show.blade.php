@extends('layouts.admin')
@section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del Edificio {{$edificio->nombre}}
    </h2>
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
        <?php foreach($pisos as $piso){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
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
        </div>
        <?php  }
        ?>
        <div class="form-group col-xs-12">
            {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
        </div>
        @endsection
    </p>
</div>