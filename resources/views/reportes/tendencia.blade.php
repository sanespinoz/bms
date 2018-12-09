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
           
          var anios = google.visualization.arrayToDataTable([
                    ['Año', 'Energia Iluminacion', 'Energia'],
                        @foreach($anios as $anioEner)
                    ['{{$anioEner->anio}}', {{$anioEner->energia_ilu}},{{$anioEner->energia}}],
                    @endforeach
                ]);

            var options = {
              title: 'Tendencia anual',
              curveType: 'function',
              legend: { position: 'bottom' }
            };


        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(anios, options);
      }
        </script>
    </head>
    <body>
        <div id="curve_chart" style="width: 900px; height: 700px">
        </div>
    </body>
</html>
@endsection
