@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		
		{!!Form::model($grupo,['route'=> ['grupo.update',$grupo->id],'method'=>'PUT'])!!}
			@include('grupo.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>
<div class="form-group col-xs-12">
    {!!Form::open(['route'=> ['grupo.destroy',$grupo->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}
</div>
@endsection
