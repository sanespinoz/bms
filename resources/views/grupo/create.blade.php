@extends('layouts.admin')

@section('content')
{{--@include('alerts.request')--}}
<h1>Registrar Grupo</h1>

{!! Form::open(['route'=>'grupo.store']) !!}

	@include('grupo.partials.form')

<div class="form-group col-xs-12">
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>

{!! Form::close() !!}

@endsection

@section('scripts')
	{!!Html::script('js/dropdown.js') !!}
@endsection

