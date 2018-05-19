@extends('layouts.admin')
	@section('content')
		{{-- @include('alerts.request') --}}
		
		{!!Form::model($lampara,['route'=> ['lampara.update',$lampara->id],'method'=>'PUT'])!!}
			@include('lampara.partials.fields')
		
		<div class="form-group col-xs-12"> 
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		</div>
		<div class="form-group col-xs-12"> 
		{!!Form::open(['route'=> ['lampara.destroy',$lampara->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
		</div>
	@endsection