@extends('layouts.admin')

@section('content')

@include('alerts.request')
<h1>
    Registrar Usuario
</h1>
{!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
    @include('user.partials.form')
    <div class="form-group col-xs-12">
        {!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default'])!!}
    </div>
    {!!Form::close()!!}

@stop
</input>