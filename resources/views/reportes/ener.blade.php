@extends('layouts.admin')

@section('content')
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                //Para Energia consumida total
                var etotal = google.visualization.arrayToDataTable([
                    ['Piso', 'Energia'],
                        @foreach($etotals as $etotal)
                    ['{{$etotal-> nombre}}', {{$etotal-> energia}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Energia Total por Piso',
                    is3D: true,
                };

//Para Energia consumida en Iluminacion
                var eiluminacion = google.visualization.arrayToDataTable([
                    ['Piso', 'Energia'],
                        @foreach($eiluminacions as $eiluminacion)
                    ['{{$eiluminacion-> nombre}}', {{$eiluminacion-> energia}}],
                    @endforeach
                ]);

                var options1 = {
                    title: 'Energia de Iluminación por Piso',
                    is3D: true,
                };


                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(etotal, options);
                var chart1 = new google.visualization.PieChart(document.getElementById('piechart1_3d'));
                chart1.draw(eiluminacion, options1);
            }
            $(document).ready(function() {
                $('#id_mest').change(function(e) {
                    if($(this).val() !== "0") {

                        document.getElementById("id_estaciont").disabled = true;
                    }else{
                        document.getElementById("id_estaciont").disabled = false;
                    }
                })


                $('#id_mes').change(function(e) {
                    if ($(this).val() !== "0") {
                        $('#id_estacion').prop("disabled", true);
                    } else {
                        $('#id_estacion').prop("disabled", false);
                    }
                })
            });



        </script>
    </head>
    <body>


    <div id="piechart_3d" style="width: 500px; height: 300px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <select class ="form-control floating-label" name="anio" id="id_aniot">
                    @foreach($anios as $anio)

                        <option value="{{ $anio->anio}}" selected>{{ $anio->anio}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-xs-2">
                <select class ="form-control floating-label" name="mes" id="id_mest">
                    <option value="0" selected>Selecciona...</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="col-xs-2">
                <select class ="form-control floating-label" name="estacion" id="id_estaciont">
                    <option selected>Selecciona...</option>
                    <option value="v">Verano</option>
                    <option value="o">Otoño</option>
                    <option value="i">Invierno</option>
                    <option value="p">Primavera</option>
                </select>
            </div>
        </div>
    </div>

    <div id="piechart1_3d" style="width: 500px; height: 300px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <select class ="form-control floating-label" name="anio" id="id_anio">
                    @foreach($anios as $anio)

                        <option value="{{ $anio->anio}}">{{ $anio->anio}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-xs-2">
                <select class ="form-control floating-label" name="mes" id="id_mes">
                    <option value="0" selected>Selecciona...</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="col-xs-2">
                <select class ="form-control floating-label" name="estacion" id="id_estacion">
                    <option value="n" selected>Selecciona...</option>
                    <option value="v">Verano</option>
                    <option value="o">Otoño</option>
                    <option value="i">Invierno</option>
                    <option value="p">Primavera</option>
                </select>
            </div>
        </div>
    </div>

    </body>

    </html>

@endsection