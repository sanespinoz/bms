@extends('layouts.admin')
	@section('content')
		@include('alerts.request') 

		{!!Form::model($piso,['route'=> ['pisos.update',$piso->id],'method'=>'PUT'])!!}
			@include('pisos.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>
<div class="form-group col-xs-12">
    {!!Form::open(['route'=> ['pisos.destroy',$piso->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
			{!! csrf_field() !!}
		{!!Form::close()!!}

		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
@endsection
