@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('pisos') }}">Pisos instaladas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del piso</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
 <div align="left" class="container"> 
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
<br>
 <div class="row">
  <div class="col-md-6">
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

    <?php  }
            ?>

    <div class="form-group col-xs-12">
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
    </div>
</div>
</body>
</html>
@endsection
