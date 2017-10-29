@extends('layouts.admin')

@section('content')
{{--@include('alerts.request')--}}
<h1>Registrar Lámpara</h1>

{!! Form::open(['route'=>'lampara.store']) !!}

	@include('lampara.partials.form')

<div class="form-group col-xs-12"> 
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
@endsection

