@extends('layouts.admin')
	@section('content')
		 @include('alerts.request')
		{!!Form::model($sector,['route'=> ['sector.update',$sector->id],'method'=>'PUT'])!!}
			@include('sector.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>
<div class="form-group col-xs-12">
    {!!Form::open(['route'=> ['sector.destroy',$sector->id],'method'=>'DELETE'])!!}
    {!! csrf_field() !!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}

		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
@endsection
