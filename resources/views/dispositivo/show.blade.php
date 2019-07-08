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
<div class="container-fluid">
<br>
 <h3>Datos del dispositivo {{$dis->nombre}}</h3>
<br>
</div>

<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
       <p><strong>Dispositivo:</strong> {{ $dis->codigo}}</p>
                    <p><strong>Piso:</strong> {{ $p->nombre}}</p>
                    <p><strong>Sector:</strong> {{ $s->nombre }}</p>
                    <p><strong>Tipo:</strong> {{ $dis->tipo }}</p>
                    <p><strong>Descripción:</strong> {{ $dis->descripcion }}</p>
                    <p><strong>Marca:</strong> {{ $dis->dimensiones }}</p>
                    <p><strong>Fecha de Instalación:</strong> {{ $dis->fecha_alta }}</p>
                    <p>
                    @if ($dis->fecha_baja) <strong>Fecha de Desinstalación:</strong> {{ $dis->fecha_baja }}
                    @endif
                    </p>
                                        <p>
                    <?php if($dis->estado == 'i')
               { ?>
                   <strong>Estado Actual:</strong> Inactivo
 
                <?php }elseif($dis->estado == 'a'){ ?>
                    <strong>Estado Actual:</strong> Activo

                <?php }elseif ($dis->estado == 'f')
                        { ?>
                    <strong>Estado Actual:</strong> Fallo
             
                <?php }else{ ?>
                    <strong>Estado Actual:</strong> Mantenimiento
          
                <?php } ?>
                    </p>
      </div>
<br>
<br>
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

</div>
</div>
</body>
</html>
@endsection
