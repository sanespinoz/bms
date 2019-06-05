@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alta Usuario</li>
  </ol>
</nav>
@section('content')
@include('alerts.request')
<html>
    <head>
    </head>
    <body>
        <div align="left" class="container">
            <h2>
                Registrar Usuario
            </h2>
            <br>
            <div class="container-fluid col-md-8">
                {!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
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
