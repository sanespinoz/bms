@extends('layouts.admin')
<br>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias instaladas</a></li>
    <li class="breadcrumb-item"><a href="{{ route('estadoluminaria.show', $lumi->id) }}">Estado Actual de la luminaria</a></li>
    <li class="breadcrumb-item active" aria-current="page">Estados previos de la Luminaria</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
    @if (@isset ($e))
    <div>  
<br>
<br>
   <p style="font-weight: bold;">{{ $e }} {{$lumi->nombre}}</p> 
</div>
    @else
 <div align="left" class="container">
<div class="container-fluid">
<br>
    <h2>
        Estado de la luminaria {{$lumi->nombre}}
    </h2>
    <br>
</div>
<div class="container-fluid col-sm-6 col-md-6 col-lg-8">
    <!-- contenido principal -->
    <section class="resultados" id="resultados">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    Fecha
                </th>
            <!--      <th>
                    ID ESTADO
                </th>
                  <th>
                    ID LUMI
                </th> -->
                <th>
                    Estado
                </th>
                <th>
                    Luminaria
                </th>
                <th>
                    Observación
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
            <tr>
                <td>
                    {{$estado->fecha}}
                </td>
           <!--   <td>
                   {{-- {{$estado->id}} --}} 
                </td>
                <td>
                   {{-- {{$lumi->id}} --}} 
                </td> -->
                <td>
                     <?php if($estado->estado == 0)
               { ?>
                    Inactiva
 
                <?php }elseif($lumi->estado($lumi->id)->estado == 1){ ?>
                    Activa

                <?php }elseif ($lumi->estado($lumi->id)->estado == 2)
                        { ?>
                    Fallo
             
                <?php }else{ ?>
                    Mantenimiento
          
                <?php } ?>
                </td>
                <td>
                    {{$lumi->nombre}}
                </td>
                <td>
                    {{$estado->observacion}}
                </td>        
            </tr>
        @endforeach
    </tbody>
    </table>
  {!! $estados->render() !!}
</section>   
</div>
</div>
@endif  
</body>
</html>
@endsection
