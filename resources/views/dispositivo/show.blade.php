@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('dispositivo') }}">Dispositivos registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del dispositivo</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
 <div align="left" class="container"> 
 <h3>Datos del dispositivo {{$dis->nombre}}</h3>
<br>
 <div class="row">
  <div class="col-md-6">
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

<div class="form-group col-xs-12">
    {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
</div>
</div>
</body>
</html>
@endsection
