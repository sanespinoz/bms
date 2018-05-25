@extends('layouts.admin')
	@section('content')
		{{-- @include('alerts.request') --}}

		{!!Form::model($user,['route'=> ['user.update',$user->id],'method'=>'PUT'])!!}
			@include('user.partials.fields')

		<div class="form-group col-xs-12">
		{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		</div>
		<div class="form-group col-xs-12">
		{!!Form::open(['route'=> ['user.destroy',$user->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
		</div>
	@endsection
