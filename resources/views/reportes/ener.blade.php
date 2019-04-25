@extends('layouts.admin')

@section('content')
<html>
    <head>
        <script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                //Para Energia consumida total
                var etotal = google.visualization.arrayToDataTable([
                    ['Piso', 'Energia'],
                        @foreach($etotals as $etotal)
                    ['{{$etotal->nombre}}', {{$etotal->energia}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Consumo Energético por Piso',
                    is3D: true,
                };

//Para Energia consumida en Iluminacion
                var eiluminacion = google.visualization.arrayToDataTable([
                    ['Piso', 'Energia'],
                        @foreach($eiluminacions as $eiluminacion)
                    ['{{$eiluminacion->nombre}}', {{$eiluminacion->energia}}],
                    @endforeach
                ]);

                var options1 = {
                    title: 'Consumo Energético de Iluminación por Piso ' ,
                    is3D: true,
                };


                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(etotal, options);
                var chart1 = new google.visualization.PieChart(document.getElementById('piechart1_3d'));
                chart1.draw(eiluminacion, options1);

              
            }
        </script>
    </head>
    <body>
        <div class="panel-body">
            <form class="navbar-form navbar-left pull-right" role="form">
                {!! Form::open(['action' => 'ReporteController@index','method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'form']) !!}
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
        <br/>
        <br/>
        <div class="container" id="testing">
            <h3 align="center">
                Export Google Chart to PDF using PHP with DomPDF
            </h3>
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Export Google Chart to PDF using PHP with DomPDF
                    </h3>
                </div>
                <div align="center" class="panel-body">
                    <div id="piechart_3d" style="width: 400px; height: 200px;">
                    </div>
                    <div id="piechart1_3d" style="width: 400px; height: 200px;">
                    </div>
                    <div id="my_div">
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="form-group">
            <h3>
                Detalle
            </h3>
            <h5 class="">
                Cálculo de los consumos de energía,representados en valores absolutos.
            </h5>
            <br/>
            @if (!$demanda->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Piso
                        </th>
                        <th>
                            Consumo Energía
                        </th>
                        <th>
                            Consumo E. Iluminación
                        </th>
                        <th>
                            Demanda Máxima
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demanda as $e)
                    <tr>
                        <td>
                            {{ $e->nombre }}
                        </td>
                        <td>
                            {{ $e->energia }}
                        </td>
                        <td>
                            {{ $e->energiailu }}
                        </td>
                        <td>
                            {{ $e->max_demanda }}
                        </td>
                    </tr>
                    @endforeach
                    <td>
                        <a href="{{ url('crear_reporte_ener',  ['etotals' => $etotals, 'eiluminacions' => $eiluminacions, 'anios' => $anios, 'demanda' => $demanda,'tipo'=> 1]) }}">
                            <button class="btn btn-block btn-primary btn-xs">
                                Ver
                            </button>
                        </a>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <a href="crear_reporte_ener/2" target="_blank">
                            <button class="btn btn-block btn-success btn-xs">
                                Descargar
                            </button>
                        </a>
                    </td>
                </tbody>
            </table>
            @else "No se registran datos para su búsqueda"
            @endif
            <br/>
        </div>
        <br/>
        <div align="center">
            <form action="" id="make_pdf" method="post">
                <input id="etotals" name="etotals" type="hidden"/>
                <input id="eiluminacions" name="eiluminacions" type="hidden"/>
                <input id="anios" name="anios" type="hidden"/>
                <input id="demanda" name="demanda" type="hidden"/>
                <button class="btn btn-danger btn-xs" id="create_pdf" name="create_pdf" type="button">
                    Make PDF
                </button>
            </form>
        </div>
    </body>
</html>
@endsection
@section('scripts')  
   
    {!! Html::script('js/ener.js') !!}

@endsection
