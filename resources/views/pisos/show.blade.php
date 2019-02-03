@extends('layouts.admin')
@section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del {{$piso->nombre}}
    </h2>
    <div class="form-group">
        Descripción:
            {{$piso->descripcion}}
    </div>
    <h3>
        Consta de los siguientes Sectores
    </h3>
    <?php foreach($sectores as $sector){ ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sector: {{$sector->nombre}}
                    </div>
                    <div class="panel-body">
                        <p>
                            Descripción: {{$sector->descripcion}}
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
