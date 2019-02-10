@extends('layouts.admin')
	@section('content')
		@include('alerts.request') 

		{!!Form::model($edificio,['route'=> ['edificio.update',$edificio->id],'method'=>'PUT'])!!}
			@include('edificio.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>
<div class="form-group col-xs-12">
    {!!Form::open(['route'=> ['edificio.destroy',$edificio->id],'method'=>'DELETE'])!!}
    {!! csrf_field() !!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}

		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
@endsection
