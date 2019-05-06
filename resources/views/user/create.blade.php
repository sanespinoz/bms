@extends('layouts.admin')
@section('content')
<html>
    <head>
    </head>
    <body>
        <div align="center" class="container">
            <h1>
                Registrar Usuario
            </h1>
            @include('alerts.request')
            <div class="container-fluid">
                {!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
		{!! csrf_field() !!}
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                @include('user.partials.form')
                <div class="form-group col-xs-12">
                    {!!Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
		{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default'])!!}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </body>
</html>
@endsection
