@extends('layouts.admin')
@section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del sector {{$sector->nombre}}
    </h2>
    <div class="form-group">
        Descripción:
            {{$sector->descripcion}}
    </div>
    <div class="form-group">
        Piso:
            {{$sector->piso->nombre}}
    </div>
    <h3>
        Grupos en el sector
    </h3>
    <?php foreach($grupos as $grupo){
             ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
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
                        <p>
                            Energía Consumida: {{$grupo->energia_consumida}}
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
</div>
@endsection
