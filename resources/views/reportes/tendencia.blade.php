@extends('layouts.admin')

@section('content')
<html>
    <head>
        <script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
           
          var tendencias = google.visualization.arrayToDataTable([
                    ['Año', 'Energia Iluminacion', 'Energia'],
                        @foreach($tendencia as $t)
                    ['{{$t->m}}', {{$t->energia_ilu}},{{$t->energia}}],
                    @endforeach
                ]);

            var options = { 
              title: 'tendencias',
              curveType: 'function',
              legend: { position: 'bottom' }
            };


        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(tendencias, options);
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
        <div id="curve_chart" style="width: 1200px; height: 200px">
        </div>
        <div class="form-group">
            <h3>
                Detalle
            </h3>
            <h5 class="">
                Indicador de Eenergía Consumida por el sistema con respecto al consumo total en el período solicitado (PEI):
            </h5>
            <br/>
            @if (!$indicador->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Piso
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
                    @foreach($indicador as $e)
                    <tr>
                        <td>
                            {{ $e->nombre }}
                        </td>
                        <td>
                            <p id="coc">
                                {{ $e->energiailu / $e->energia }}
                            </p>
                        </td>
                        <td>
                            @if (($e->energiailu / $e->energia) >= 0 && ($e->energiailu / $e->energia) <= 4) Excelente
                            @elseif ($e->energiailu / $e->energia) > 4 && ($e->energiailu / $e->energia) <= 10) Bueno
                            @elseif ($e->energiailu / $e->energia) > 10 && ($e->energiailu / $e->energia) <= 19) Normal
                            @else ($e->energiailu / $e->energia) > 19 && ($e->energiailu / $e->energia) <= 100) Malo
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else "No se registran datos para su búsqueda"
            @endif
            <br/>
            <script type="text/javascript">
                function Valoracion(){
              
                var e = document.getElementById("coc");
                if (e >= 0 && e =< 4) { 
                  var t = 'Excelente';
 
} else if (e > 4 && e =< 10) {
  var t = 'Bueno';
 
} else {
  var t = 'Normal';
 
};
                 document.getElementById("pei").value = t;

            }
            </script>
        </div>
    </body>
</html>
@endsection
