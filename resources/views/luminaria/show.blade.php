@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias registradas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información de la luminaria</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
 <div align="left" class="container"> 
 <h3>Datos de la luminaria {{$l->nombre}}</h3>
<br>
 <div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
                <div class="panel-heading">
                    Luminaria: {{ $l->codigo }}
                </div>
                <div class="panel-body">
                    <p>
                        Piso: {{ $p->nombre}}
                    </p>
                    <p>
                        Sector: {{ $s->nombre }}
                    </p>
                    <p>
                        Grupo: {{ $g->nombre }}
                    </p>
                    <p>
                        Código: {{ $l->codigo }}
                    </p>
                    <p>
                        Tipo: {{ $l->tipo }}
                    </p>
                    <p>
                        Descripción: {{ $l->descripcion }}
                    </p>
                    <p>
                        Dimensiones: {{ $l->dimensiones }}
                    </p>
                    <p>
                        Voltaje Nominal: {{ $l->voltaje_nominal }}
                    </p>
                    <p>
                        Potencia Nominal: {{ $l->potencia_nominal }}
                    </p>
                    <p>
                        Corriente Nominal: {{ $l->corriente_nominal }}
                    </p>
                    <p>
                        Fecha de Instalación: {{ $l->fecha_alta }}
                    </p>
                    <p>
                    @if ($l->fecha_baja) Fecha de Desinstalación: {{ $l->fecha_baja }}
                    @endif
                    </p>
                    <p>
                        Vida Útil: {{ $l->vida_util }}
                    </p>
                    <p>
                        Estado Actual: {{ $estado_lum }}
                    </p>
                </div>
            </div>
        </div>
    </div>


<div class="form-group col-xs-12">
    {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
</div>
</div>
</body>
</html>
@endsection
