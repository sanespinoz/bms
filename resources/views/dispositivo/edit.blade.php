@extends('layouts.admin')
	@section('content')
		 @include('alerts.request') 
		
		{!!Form::model($dispositivo,['route'=> ['dispositivo.update',$dispositivo->id],'method'=>'PUT'])!!}
			@include('dispositivo.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>
<div class="form-group col-xs-12">
    {!!Form::open(['route'=> ['dispositivo.destroy',$dispositivo->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}

		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
@endsection
</div>