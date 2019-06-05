@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio Instalado</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición de edificio</li>
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
	</div>
<div class="container-fluid col-md-8">

	{!!Form::model($edificio,['route'=> ['edificio.update',$edificio->id],'method'=>'PUT'])!!}
			@include('edificio.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
</div>
	</body>
	</html>
	
@endsection
