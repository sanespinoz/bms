@extends('layouts.admin')
    @section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del grupo {{$grupo->nombre}}
    </h2>
    <div class="form-group">
        Descripción:{{$grupo->descripcion}}
    </div>
    <h3>
        Luminarias en el sector
    </h3>
    <?php foreach($luminarias as $l){
             ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Código {{ $l->codigo }}
                    </div>
                    <div class="panel-body">
                        <p>
                            Nombre: {{ $l->nombre }}
                        </p>
                        <p>
                            Tipo: {{ $l->tipo }}
                        </p>
                        <p>
                            Descripción: {{ $l->descripcion }}
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
