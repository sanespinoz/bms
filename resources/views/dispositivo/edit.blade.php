@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('dispositivo') }}">Dispositivos registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición del dispositivo</li>
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
    Editar Dispositivo   
</h2>
<br>
<div class="container-fluid col-md-8">
		
		{!!Form::model($dispositivo,['route'=> ['dispositivo.update',$dispositivo->id],'method'=>'PUT'])!!}
			@include('dispositivo.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
</div>
</div>

</body>
</html>
@endsection
