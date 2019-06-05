@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias instaladas</a></li>
    <li class="breadcrumb-item">{!! link_to(URL::previous(), 'Estado Actual de la luminaria') !!}</li>
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
    <h2>
        Estado de la luminaria {{$lumi->nombre}}
    </h2>
</div>
<br>
    <!-- contenido principal -->
    <section class="resultados" id="resultados">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    Fecha
                </th>
                  <th>
                    ID ESTADO
                </th>
                  <th>
                    ID LUMI
                </th>
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
                <td>
                    {{$estado->id}}
                </td>
                <td>
                    {{$lumi->id}}
                </td>
                <td>
                    {{$estado->estado}}
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

@endif  
</body>
</html>
@endsection
