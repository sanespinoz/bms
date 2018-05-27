@extends('layouts.admin')

@section('content')

<h1>Registrar Usuario</h1>

{!! Form::open(['route'=>'user.store', 'method'=>'POST']) !!}

	@include('user.partials.form')

<div class="form-group col-xs-12">
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection
