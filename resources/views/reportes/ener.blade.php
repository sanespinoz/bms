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
                         @if (!$demanda->isEmpty())
                            @foreach($eiluminacions as $eiluminacion)
                        ['{{$eiluminacion->nombre}}', {{$eiluminacion->energia}}],
                        @endforeach
                                    @else "No se registran datos para su búsqueda"
                @endif
                    ]);

                    var options1 = {
                        title: 'Consumo Energético de Iluminación por Piso' ,
                        is3D: true,
                    };

                    var chart_a = document.getElementById('piechart_3d');
                    var chart = new google.visualization.PieChart(chart_a);
                   google.visualization.events.addListener(chart, 'ready', function()
                    {
                        chart_a.innerHTML ='<img src="' + chart.getImageURI() + '" class="img-responsive">';
                    });
                    chart.draw(etotal, options);


                    var chart1_a = document.getElementById('piechart1_3d');
                    var chart1 = new google.visualization.PieChart(chart1_a);
                   google.visualization.events.addListener(chart1, 'ready', function()
                    {
                        chart1_a.innerHTML ='<img src="' + chart1.getImageURI() + '" class="img-responsive">';
                    });
                    chart1.draw(eiluminacion, options1);                  
                }
           
                google.charts.load('current', {'packages':['table']});
          google.charts.setOnLoadCallback(drawTable);

          function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Piso');
            data.addColumn('number', 'Consumo Energía');
            data.addColumn('number', 'Consumo Energía de Iluminación');
            data.addColumn('number', 'Demanda Máxima');
             data.addRows([ 
           @foreach($demanda as $e)       
              ['{{ $e->nombre }}',  {{ $e->energia }}, {{ $e->energiailu}},{{ $e->max_demanda }}],
         @endforeach
                    ]);
             var table_a = document.getElementById('table_div');
            var tab_datos = new google.visualization.Table(table_a);

            tab_datos.draw(data, {showRowNumber: true, width: '80%'});

          }
        </script>
        <div class="container-fluid">
            <br/>
            <br/>
            {!! Form::open(['action' => 'ReporteController@index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'form']) !!}
            <div class="form-group">
                <select class="form-control" name="anio">
                    @foreach($anios as $anio)
                    <option selected="selected" value="{{ $anio->anio }}">
                        {{ $anio->anio }}
                    </option>
                    @endforeach
                </select>
                <select class="form-control" name="mes">
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
            </div>
            <button class="btn btn-primary" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-search">
                </span>
            </button>
            {!! Form::close() !!}
        </div>
    </head>
    <body>
        <div align="center" class="container" id="testing" style="width: 800px;
  margin: 0 auto; ">
            <h2 align="center">
                Consumo energético
            </h2>
            <br/>
            <div align="center" class="panel panel-default">
                <div align="center" class="panel-body">
                    <div align="center" id="piechart_3d">
                    </div>
                    <div align="center" id="piechart1_3d">
                    </div>
                    <br/>
                    <div align="center" class="panel-heading">
                        <h4 align="center">
                            Detalle
                        </h4>
                    </div>
                    <br/>
                    <div align="center" class="panel-body">
                        <div align="center" id="table_div">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<div align="center">
    {!! Form::open(['action' => 'ReporteController@createPDF','method'=>'POST','id'=>'make_pdf']) !!}
    <input id="hidden_html" name="hidden_html" type="hidden"/>
    <button class="btn btn-danger btn-xs" id="create_pdf" name="create_pdf" type="submit">
        Imprimir
    </button>
    {!! Form::close() !!}
</div>
@section('scripts')
        {!!Html::script('js/pdfenergia.js') !!}
        @show
@endsection
