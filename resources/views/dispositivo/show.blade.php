@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dispositivo: {{ $dis->codigo}}
                </div>
                <div class="panel-body">
                    <p>
                        Nombre : {{ $dis->nombre }}
                    </p>
                    <p>
                        Descripción: {{ $dis->descripcion }}
                    </p>
                    <p>
                        Tipo: {{ $dis->tipo }}
                    </p>
                    <p>
                        Marca: {{ $dis->marca }}
                    </p>
                    <p>
                        Piso: {{ $p->nombre }}
                    </p>
                    <p>
                        Sector: {{ $s->nombre }}
                    </p>
                    <p>
                        Fecha de Instalación: {{ $p->fecha_alta }}
                    </p>
                    <p>
                        Fecha de Baja: {{ $p->fecha_baja }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
