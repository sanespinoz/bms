@extends('app')

@section('content')
{{--@include('alerts.request')--}}
<h1>Registrar Sector</h1>

{!! Form::open(['route'=>'sector.store']) !!}

	@include('sector.partials.form')

<div class="form-group col-xs-12"> 
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection

