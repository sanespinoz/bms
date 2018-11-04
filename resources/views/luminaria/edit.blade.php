@extends('layouts.admin')
@section('content')
		 @include('alerts.request') 
		
		{!!Form::model($luminaria,['route'=> ['luminaria.update',$luminaria->id],'method'=>'PUT'])!!}
			@include('luminaria.partials.fields')
		
		<div class="form-group col-xs-12"> 
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		</div>
		<div class="form-group col-xs-12"> 
		{!!Form::open(['route'=> ['luminaria.destroy',$luminaria->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
		</div>
	@endsection