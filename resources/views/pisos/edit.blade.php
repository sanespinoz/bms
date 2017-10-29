@extends('app')
	@section('content')
		{{-- @include('alerts.request') --}}
		
		{!!Form::model($piso,['route'=> ['pisos.update',$piso->id],'method'=>'PUT'])!!}
			@include('pisos.partials.form')
		
		<div class="form-group col-xs-12"> 
		{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		</div>
		<div class="form-group col-xs-12"> 
		{!!Form::open(['route'=> ['pisos.destroy',$piso->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
		</div>
	@stop
		