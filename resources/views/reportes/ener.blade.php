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
                    title: 'Energia Total por Piso',
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
                    title: 'Energia de Iluminación por Piso',
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
        <div id="piechart_3d" style="width: 800px; height: 500px;">
        </div>
        <div id="piechart1_3d" style="width: 800px; height: 500px;">
        </div>
    </body>
</html>
@endsection
