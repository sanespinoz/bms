@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Índice de Eficiencia Energética</li>
  </ol>
</nav>
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
        title: '',
        curveType: 'function',
        width:650,
        height:500, 
        vAxis: {format: 'decimal',minValue: 0},
        legend: { position: 'bottom' }
      };

      var chart_a = document.getElementById('curve_chart');
      var chart = new google.visualization.LineChart(chart_a);
      google.visualization.events.addListener(chart, 'ready', function()
      {
        chart_a.innerHTML ='<img src="' + chart.getImageURI() + '" class="img-responsive">';
      });

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
        title: '',
        curveType: 'function',
        width:650,
        height:500, 
        vAxis: {format: 'decimal',minValue: 0},
        legend: { position: 'bottom' }
      };

      var chart_m = document.getElementById('curve_chart');
      var chartmes = new google.visualization.LineChart(chart_m);
      google.visualization.events.addListener(chartmes, 'ready', function()
      {
        chart_m.innerHTML ='<img src="' + chartmes.getImageURI() + '" class="img-responsive">';
      });
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
        title: '',
        curveType: 'function',

        vAxis: {minValue: 0},
        legend: { position: 'bottom' }
      };

      var chart_g = document.getElementById('curve_chart');
      var chartgral = new google.visualization.LineChart(chart_g);
      google.visualization.events.addListener(chartgral, 'ready', function()
      {
        chart_g.innerHTML ='<img src="' + chartgral.getImageURI() + '" class="img-responsive">';
      });

      chartgral.draw(eficienciagral, optionsgral);
      <?php
    } else echo "No se registran datos";
    ?>
  }
  google.charts.load('current', {'packages':['table']});
  google.charts.setOnLoadCallback(drawTable);

  function drawTable() {
    var data = new google.visualization.DataTable();
    @if (isset($eficiencias))
    data.addColumn('string', 'Mes');
    data.addColumn('number', 'IEE [W][Lux]/[m^2]');
    data.addColumn('string', 'Valoración');
    data.addRows([ 

      @foreach($eficiencias as $e)      
      ['{{ $e->mes }}',  {{ $e->eficiencia}},  
      @if ((($e->eficiencia) >= 0) && ($e->eficiencia) <= 2.0)) 'Óptimo'
    @elseif ((($e->eficiencia) > 2.0) && ($e->eficiencia) <= 3.5)) 'Medio'
@else 'Máximo'
@endif],
@endforeach
]);
@elseif (isset($eficienciamensual))
data.addColumn('number', 'Día');
data.addColumn('number', 'IEE [W][Lux]/[m^2]');
data.addColumn('string', 'Valoración');
data.addRows([ 

  @foreach($eficienciamensual as $e)      
  [{{ $e->dia }},  {{ $e->eficiencia}},  
  @if ((($e->eficiencia) >= 0) && (($e->eficiencia) <= 2.0)) 'Óptimo'
  @elseif ((($e->eficiencia) > 2.0) && (($e->eficiencia) <= 3.5)) 'Medio'
  @else 'Máximo'
  @endif],
  @endforeach
  ]);
@elseif (isset($eficienciagral))
data.addColumn('string', 'Día');
data.addColumn('number', 'IEE [W][Lux]/[m^2]');
data.addColumn('string', 'Valoración');
data.addRows([ 
 @foreach($eficienciagral as $e)      
 ['{{ $e->mes }}',  {{ $e->eficiencia}}, 
 @if ((($e->eficiencia) >= 0) && (($e->eficiencia) <= 2.0)) 'Óptimo'
 @elseif ((($e->eficiencia) > 2.0) && (($e->eficiencia) <= 3.5)) 'Medio'
 @else 'Máximo'
 @endif],
 @endforeach
 ]);


@else "No se registran datos para su búsqueda"
@endif
var table_a = document.getElementById('table_div');
var tab_datos = new google.visualization.Table(table_a);

tab_datos.draw(data, {showRowNumber: false, align:'center'});
}
</script>
<div class="container-fluid">
  <br/>
  <br/>
  {!! Form::open(['action' => 'ReporteController@eficienciaEnergetica','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'form']) !!}
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
  <div align="center" class="container" id="testing" style="width: 890px;
  margin: 0 auto;">
  <br/>

  <div align="center" class="panel panel-default">
    <div align="center" class="panel-body">
     <h4 align="center">
       <strong>{{ $tit }}</strong> </h4>
       <div align="center" id="curve_chart">
       </div>
       <br/>
       <div align="center" class="panel-heading" style="width: 500px;
       margin: 0 auto;">
       <h4 align="center">
        Detalle
      </h4>
      <h5>
        Interpretación del Índice de Eficiencia Energética
      </h5>
      <br/>
    </div>
    <br/>
    <div align="center" class="panel-heading" style="width: 500px;
    margin: 0 auto;">
    <div align="center" class="panel-body">
      <div align="center" id="table_div">
      </div>
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
  <input id="hidden_html_titulo" name="hidden_html_titulo" value= "eficiencia" type="hidden"/>
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
