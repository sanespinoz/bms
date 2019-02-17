@extends('layouts.admin')

@section('content')
<html>
    <head>
        <script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Día');
      data.addColumn('number', 'Energia');
      data.addColumn('number', 'Energia de Iluminacion');
      data.addRows([
         @foreach($tendencia as $t)
                    [{{$t->fecha}}, {{$t->energia}},{{$t->energia_iluminacion}}],
                     @endforeach

   
      ]);
     

      var options = {

          title: 'Tendencia historica de Consumo energético',
          subtitle: 'para todo el Edificio',
          width:900,
          height:500, 

        hAxis: {
          title: 'Días'
        },
        vAxis: {
          title: 'Consumo'
       },
        series: {
          1: {curveType: 'function'}
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);

       var datapei = new google.visualization.DataTable();
        datapei.addColumn('number', 'fecha');
        datapei.addColumn('number', 'PEI');
        datapei.addRows([
        @foreach($pei as $p)
         [{{$p->fecha}},{{$p->division}}],
        @endforeach  
        ]);
        var optionspei = {
        title: 'Proporción de Energía consumida por el sistema con respecto al consumo total (PEI)',
        width:900,
        height:500, 
        hAxis: {
          title: 'Días'
        },
        vAxis: {
          title: 'Consumo'
       },
        series: {
          1: {curveType: 'function'}
        }
      };

    var chartpei = new google.visualization.LineChart(document.getElementById('chart_div_pei'));
    chartpei.draw(datapei, optionspei);
    }
        </script>
    </head>
    <body>
        {{-- buscador  --}}
        <div class="panel-body">
            <form class="navbar-form navbar-left pull-right" role="form">
                {!! Form::open(['action' => 'ReporteController@tendenciaConsumo','method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'form']) !!}
                <div class="form-group">
                    <select class="form-control floating-label" name="anio">
                        @foreach($anios as $anio)
                        <option selected="selected" value="{{ $anio->anio }}">
                            {{ $anio->anio }}
                        </option>
                        @endforeach
                    </select>
                    <br>
                        <select class="form-control floating-label" name="mes">
                            <option selected="selected" value="00">
                            </option>
                            <option value="01">
                                Enero
                            </option>
                            <option value="02">
                                Febrero
                            </option>
                            <option value="03">
                                Marzo
                            </option>
                            <option value="04">
                                Abril
                            </option>
                            <option value="05">
                                Mayo
                            </option>
                            <option value="06">
                                Junio
                            </option>
                            <option value="07">
                                Julio
                            </option>
                            <option value="08">
                                Agosto
                            </option>
                            <option value="09">
                                Septiembre
                            </option>
                            <option value="10">
                                Octubre
                            </option>
                            <option value="11">
                                Noviembre
                            </option>
                            <option value="12">
                                Diciembre
                            </option>
                        </select>
                        <button class="btn btn-primary" type="submit">
                            <span aria-hidden="true" class="glyphicon glyphicon-search">
                            </span>
                        </button>
                        {!! Form::close() !!}
                    </br>
                </div>
            </form>
        </div>
        {{-- Fin buscador  --}}
        <div id="chart_div">
        </div>
        <div id="chart_div_pei">
        </div>
        {{-- TABLA DE DETALLE --}}
        <div class="form-group">
            <h3>
                Detalle
            </h3>
            <h4 class="">
                Proporción de Energía ahorrada con el sistema de control automatizado.
            </h4>
            <br/>
            @if (!$pei->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Día
                        </th>
                        <th>
                            PEI
                        </th>
                        <th>
                            Valoración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pei as $e)
                    <tr>
                        <td>
                            {{ $e->fecha }}
                        </td>
                        <td>
                            <p id="coc">
                                {{ $e->division}}
                            </p>
                        </td>
                        <td>
                            @if (($e->division) >= 0 && ($e->division) <= 4) Excelente
                            @elseif (($e->division) > 4 && ($e->division) <= 10) Bueno
                            @elseif (($e->division) > 10 && ($e->division) <= 19) Normal
                            @else Malo
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else "No se registran datos para su búsqueda"
            @endif
            <div class="form-group">
                <h4>
                    Pico Máximo de Consumo en el Mes:
                </h4>
                {{ $maximo }}
            </div>
        </div>
        <br/>
    </body>
</html>
@endsection
