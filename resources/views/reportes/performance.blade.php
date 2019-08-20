@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eficiencia de las Luminarias</li>
  </ol>
</nav>
@section('content')
<head>
  <script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
  </script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
     <?php
     if (isset($datos)) 
     {
       ?>
       var datos = google.visualization.arrayToDataTable([
        ['Clasificación', 'Bajas','Inactivas', 'Activas'],
        @foreach($datos as $lums)                      
        ['{{$lums['tipo']}}', {{$lums['bajas']}},{{$lums['fallas']}}, {{$lums['activas']}}],          
        @endforeach
        ]);

       var options = {   
        width:600,
        height:500, 
        chart:{ align: 'center',         

      },   

      vAxis:{type:'number',minValue: 0}
    };


    var columnchart_material = document.getElementById('columnchart_material');
    var chart = new google.visualization.ColumnChart(columnchart_material);
    google.visualization.events.addListener(chart, 'ready', function () {
      columnchart_material.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(columnchart_material.innerHTML);
    });

    chart.draw(datos, options);
    <?php
  } else echo "No se registran datos";
  ?>
}
</script>
<div class="container-fluid">
  <br/>
  <br/>
  {!! Form::open(['action' => 'ReporteController@performanceLuminaria','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'form']) !!}
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
  <br/>
  <div align="center" class="panel panel-default">
    <div align="center" class="panel-body">
     <h4 align="center">
       <strong>{{ $tit }}</strong> </h4>
       <br/> 
       <h5>Luminarias dadas de Bajas, con Fallas y Activas</h5>
       <br/> 
       <div id="columnchart_material" align="center">
       </div>
       {{-- TABLA DE DETALLE ALINEAR AL CENTRO VER TENDENCIA --}}
       <br/>  
       <br/>

       <div align="center" class="panel-heading" style="width: 500px;
       margin: 0 auto; ">
       <h4 align="center">
         <strong>Detalle</strong> </h4>
       </div>
       <div align="left" class="panel-body" style="width: 500px;
       margin: 0 auto; ">
       <div class="form-group">

        <strong>Total de cambios:</strong> {{ $totales }}
        <br/>
        <strong>Luminarias que cumplen con su vida útil:</strong> {{ $porcentaje }}%
        <br/>
        <br/>
        <strong>Promedio de Horas Activas:</strong>
        <br/>
        @foreach($promha as $p)
        <li class="">
          {{ $p->tipo }}:{{ $p->hs_activas }} hs.
        </li>
        @endforeach
        <br/>
        <br/>
        <strong>Promedio de Vida Útil:</strong>
        <br/>
        @foreach($promvu as $p)
        @if ($p->hs_activas <> '')
        <li class="">
          {{ $p->tipo }}:{{ $p->hs_activas }} hs.
        </li>
        @endif
        @endforeach
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
  <input id="hidden_html_titulo" name="hidden_html_titulo" value= "performance" type="hidden"/>
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
