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
            <?php
            if (isset($eficiencias)) 
            {
             ?>

              var eficiencias = google.visualization.arrayToDataTable([
                    ['Mes', 'Eficiencia'],
                        @foreach($eficiencias as $efic)
                    ['Mes {{$efic->mes}}',{{$efic->eficiencia}}],
                    @endforeach
                ]);

            var options = {
              title: 'Índice de Eficiencia Energética',
              curveType: 'function',
              vAxis: {minValue: 0.00},
              legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(eficiencias, options);
            <?php
          }
          elseif (isset($eficienciamensual)) {?>
            var eficienciasmes = google.visualization.arrayToDataTable([
                    ['Día', 'Eficiencia'],
                        @foreach($eficienciamensual as $efic)
                    ['Día {{$efic->dia}}',{{$efic->eficiencia}}],
                    @endforeach
                ]);

            var optionsmes = {
              title: 'Índice de Eficiencia Energética',
              curveType: 'function',
             vAxis: {minValue: 0.00},
              legend: { position: 'bottom' }
            };
            var chartmes = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chartmes.draw(eficienciasmes, optionsmes);
          
          <?php
        } elseif (isset($eficienciagral)){
            ?>
            var eficienciagral = google.visualization.arrayToDataTable([
                    ['Mes', 'Eficiencia'],
                        @foreach($eficienciagral as $efic)
                    ['Mes {{$efic->mes}}',{{$efic->eficiencia}}],
                    @endforeach
                ]);

            var optionsgral = {
              title: 'Índice de Eficiencia Energética para todo el edificio en el año vigente',
              curveType: 'function',
            
              vAxis: {minValue: 0.00},
              legend: { position: 'bottom' }
            };
            var chartgral = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chartgral.draw(eficienciagral, optionsgral);
      <?php
    } else echo "No hay Datos para mostrar";
    ?>
    }
        </script>
    </head>
    <body>
        {{-- buscador  --}}
        <div class="panel-body">
            <form class="navbar-form navbar-left pull-right" role="form">
                {!! Form::open(['action' => 'ReporteController@tendenciaConsumo','method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'form']) !!}
                <div class="form-group">
                    <select class="form-control floating-label" name="piso">
                        @foreach($pisos as $piso)
                        <option value="{{ $piso->id }}">
                            {{ $piso->nombre }}
                        </option>
                        @endforeach
                    </select>
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
        <div id="curve_chart" style="width: 900px; height: 700px">
        </div>
        {{-- TABLA DE DETALLE --}}
        <div class="form-group">
            <h3>
                Detalle
            </h3>
            <h5 class="">
                Interpretación del Índice de Eficiencia Energética
            </h5>
            <br/>
            @if (isset($eficiencias))
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Mes
                        </th>
                        <th>
                            IEE
                        </th>
                        <th>
                            Valoración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eficiencias as $e)
                    <tr>
                        <td>
                            {{ $e->mes }}
                        </td>
                        <td>
                            <p id="coc">
                                {{ $e->eficiencia}}
                            </p>
                        </td>
                        <td>
                            @if (($e->eficiencia) >= 0 && ($e->eficiencia) <= 2.0) Óptimo
                            @elseif (($e->eficiencia) > 2.0 && ($e->eficiencia) <= 3.5) Medio
                            @else Máximo
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @elseif (isset($eficienciamensual))
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Dia
                        </th>
                        <th>
                            IEE
                        </th>
                        <th>
                            Valoración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eficienciamensual as $e)
                    <tr>
                        <td>
                            {{ $e->dia }}
                        </td>
                        <td>
                            <p id="coc">
                                {{ $e->eficiencia}}
                            </p>
                        </td>
                        <td>
                            @if (($e->eficiencia) >= 0 && ($e->eficiencia) <= 2.0) Óptimo
                            @elseif (($e->eficiencia) > 2.0 && ($e->eficiencia) <= 3.5) Medio
                            @else Máximo
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @elseif (isset($eficienciagral))
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Mes
                        </th>
                        <th>
                            IEE
                        </th>
                        <th>
                            Valoración
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eficienciagral as $e)
                    <tr>
                        <td>
                            {{ $e->mes }}
                        </td>
                        <td>
                            <p id="coc">
                                {{ $e->eficiencia}}
                            </p>
                        </td>
                        <td>
                            @if (($e->eficiencia) >= 0 && ($e->eficiencia) <= 2.0) Óptimo
                            @elseif (($e->eficiencia) > 2.0 && ($e->eficiencia) <= 3.5) Medio
                            @else Máximo
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else "No se registran datos para su búsqueda"
            @endif
        </div>
    </body>
</html>
@endsection
