@extends('layouts.admin')

@section('content')
      <html>
      <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
           
 var eficiencias = google.visualization.arrayToDataTable([
                    ['Mes', 'Energia'],
                        @foreach($eficiencias as $efic)
                    ['Mes {{$efic->mes}}',{{($efic->energia)/192}}],
                    @endforeach
                ]);

            var options = {
              title: 'Índice de Eficiencia Energética 2018',
              curveType: 'function',
              legend: { position: 'bottom' }
            };


        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(eficiencias, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 700px"></div>
  </body>
</html>
@endsection