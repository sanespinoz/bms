@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tendencia de Consumo Energético</li>
  </ol>
</nav>
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
      data.addColumn('number', 'fecha');
      data.addColumn('number', 'Energía');
      data.addColumn('number', 'Energía de Iluminación');
      data.addRows([
        @foreach($tendencia as $t)
        [{{$t->fecha}}, {{$t->energia}},{{$t->energia_iluminacion}}],
        @endforeach
        ]);

      var options = {
        title: '',
        width:600,
        height:500, 
        hAxis: {
          title: 'Meses',
          format: '0'
        },
        vAxis: {
          title: 'Consumo'
        },
        series: {
          1: {curveType: 'function'}
        }
      };
      var chart_a = document.getElementById('chart_div');
      var chart = new google.visualization.ColumnChart(chart_a);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
        chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart_div.innerHTML);
      });

      chart.draw(data, options);


      var datapei = new google.visualization.DataTable();
      datapei.addColumn('number', 'Fecha');
      datapei.addColumn('number', 'PEI');
      datapei.addRows([
        @foreach($pei as $p)
        [{{$p->fecha}},{{$p->division}}],
        @endforeach  
        ]);
      var optionspei = {
        title: '',
        width:600,
        height:500, 
        hAxis: {
          title: 'Meses',
          format: '0'
        },   
        vAxis: {
          minValue: 0,
          title: 'Consumo(%)'
        },
        series: {
          1: {curveType: 'function'}
        }
      };
      var chartpei_a = document.getElementById('chart_div_pei');
      var chartpei = new google.visualization.LineChart(chartpei_a);
      google.visualization.events.addListener(chartpei, 'ready', function()
      {
        chartpei_a.innerHTML ='<img src="' + chartpei.getImageURI() + '" class="img-responsive">';
      });
      chartpei.draw(datapei, optionspei);

    }

    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Mes');
      data.addColumn('number', 'PEI');
      data.addColumn('string', 'Valoración');
      data.addRows([ 
        @if (!$pei->isEmpty())
        @foreach($pei as $e)             
        ['{{ $e->fecha }}',  {{ $e->division}},
        @if ((($e->division) >= 0) && (($e->division) <= 4)) 'Excelente'
        @elseif ((($e->division) > 4) && (($e->division) <= 10)) 'Bueno'
        @elseif ((($e->division) > 10) && (($e->division) <= 19)) 'Normal'
        @else  'Malo'
        @endif ],
        @endforeach
        @else "No se registran datos para su búsqueda"
        @endif
        ]);
      var table_a = document.getElementById('table_div');
      var tab_datos = new google.visualization.Table(table_a);

      tab_datos.draw(data, {showRowNumber: false, align:'center', width: '60%', height: '70%'});
    }                         
  </script>
  <div class="container-fluid">
    <br/>
    <br/>
    {!! Form::open(['action' => 'ReporteController@tendenciaConsumo','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'form']) !!}
    <div class="form-group">
      <select class="form-control floating-label" name="piso">
        @foreach($pisos as $piso)
        <option value="{{ $piso->id }}">{{ $piso->nombre }}</option>
        @endforeach
      </select>
      <select class="form-control" name="anio">
        @foreach($anios as $anio)
        <option selected="selected" value="{{ $anio->anio }}">
          {{ $anio->anio }}
        </option>
        @endforeach
      </select>
      <select class="form-control" name="mes">
        <option selected="selected" value="00"> Mes
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
      <span aria-hidden="true" class="glyphicon glyphicon-search"> Buscar
      </span>
    </button>
    {!! Form::close() !!}
  </div>
</head>
<body>
  <div align="center" class="container" id="testing" style="width: 950px;
  margin: 0 auto; ">

  <div align="center" class="panel panel-default">
    <div align="center" class="panel-body" style="width: 500px;
       margin: 0 auto; ">
     <h4 align="center">
       <strong>{{ $tit }}</strong> </h4>
       <div align="center" id="chart_div">
       </div>
       <h4 align="center">
         <strong>{{ $tit1 }}</strong> </h4>
         <div align="center" id="chart_div_pei">
         </div>
         {{-- TABLA DE DETALLE --}}
         <div align="center" class="panel-heading" style="width: 500px;
       margin: 0 auto; ">
          <h4 align="center">
            Detalle
          </h4>
        </div>
        <h4>
          Proporción de Energía ahorrada con el sistema de control automatizado
        </h4>

        <div align="center" class="panel-body">
          <div align="center" id="table_div">
          </div>
          <br/>
          <div class="form-group">
            <h4>
              Pico Máximo de Consumo en el Año: {{ $maximo }} kW, el día {{ $fechpic->fecha }}
            </h4>

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
  <input id="hidden_html_titulo" name="hidden_html_titulo" value= "tendencia" type="hidden"/>
  <button class="btn btn-danger btn-xs" id="create_pdf" name="create_pdf" type="submit">
    Imprimir
  </button>
  {!! Form::close() !!}
</div>
<br/>  
<br/>
@section('scripts')
{!!Html::script('js/pdfenergia.js') !!}
@show
@endsection


