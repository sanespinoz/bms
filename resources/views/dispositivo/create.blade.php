@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registrar dispositivo</li>
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
    Registrar Dispositivo
</h2>
	<div class="container-fluid col-md-8">
{!! Form::open(['route'=>'dispositivo.store']) !!}

	@include('dispositivo.partials.form')
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
@section('scripts')
	{!!Html::script('js/dispos.js')!!}
	{!!Html::script('js/datepick.js')!!}

@endsection
