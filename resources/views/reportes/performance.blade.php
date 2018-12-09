@extends('layouts.admin')

@section('content')
<html>
    <head>
        <script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(){
       var datos = google.visualization.arrayToDataTable([
          ['Clasificación', 'Bajas','Inactivas', 'Activas'],
        @foreach($datos as $lums)                      
    ['{{$lums['tipo']}}', {{$lums['bajas']}},{{$lums['fallas']}}, {{$lums['activas']}}],          
        @endforeach
          ]);

        var options = {
          chart: {
            title: 'Eficacia de las Luminarias de acuerdo a su Clase',
            subtitle: 'Luminarias dadas de bajas, con fallas y activas en el período solicitado'}  
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(datos, google.charts.Bar.convertOptions(options));
     }
        </script>
    </head>
    <body>
        <div class="panel-body">
            <form class="navbar-form navbar-left pull-right" role="form">
                {!! Form::open(['action' => 'ReporteController@performanceLuminaria','method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'form']) !!}
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
        <div id="columnchart_material" style="width: 900px; height: 700px;">
        </div>
    </body>
</html>
@endsection
