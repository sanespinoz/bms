@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Luminaria: {{ $l->identificacion }}
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
                        Nombre: {{ $l->nombre }}
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
                        Fecha de Desinstalación: {{ $l->fecha_baja }}
                    </p>
                    <p>
                        Vida Útil: {{ $l->vida_util }}
                    </p>
                    <p>
                        Estado Actual: {{ $l->estado }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
{!! $luminarias->render() !!}    
@endsection
