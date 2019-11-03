@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
		<li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
		<li class="breadcrumb-item"><a href="{{ url('sector') }}">Sectores registrados</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edición del sector</li>
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
			Editar sector de luminarias
		</h2>
		<br>
		<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
			{!!Form::model($sector,['route'=> ['sector.update',$sector->id],'method'=>'PUT'])!!}
			{!! csrf_field() !!}
			@include('sector.partials.fields')
			<br>
			<br>
			<div class="form-group col-xs-12">
				{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
				{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</body>
</html>

@endsection


