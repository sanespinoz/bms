@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias instaladas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición de la Luminaria</li>
  </ol>
</nav>
@section('content')
@include('alerts.request')
<html>
<head>
</head>
<body>
<div align="left" class="container">
<h2>
    Editar Luminaria
</h2>
<br>
<div class="container-fluid col-md-8">
		
{!!Form::model($luminaria,['route'=> ['luminaria.update',$luminaria->id],'method'=>'PUT',$pisos,$sectdelp, $gruposdelp, $p, $g, $s])!!}
{!! csrf_field() !!}
			@include('luminaria.partials.fields')
            <div class="row">
            <div class="form-group col-md-12">
            {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		    {!!Form::close()!!}

		    {!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
</div>
</div>
</div>
</body>
</html>
@endsection
@section('scripts')     
    {!! Html::script('js/editlumis.js') !!}
    {!! Html::script('js/editlumisgrupos.js') !!} 
    {!! Html::script('js/datepick.js') !!}
@endsection
