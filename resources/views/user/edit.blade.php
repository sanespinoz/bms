@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('user') }}">Usuarios registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición del usuario</li>
  </ol>
</nav>
@section('content')
@include('alerts.request')

<html>
<head>
</head>
<body>
<div class="form-group col-xs-12">
    <h2>
        Datos del usuario {{$user->name}}
    </h2>
    {!!Form::model($user,['route'=> ['user.update',$user->id],'method'=>'PUT',$rols,$rolse])!!}
            @include('user.partials.fields')
    <div class="form-group col-xs-12">
        {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
      {!! Form::close()!!}


{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
    </div>
</div>
  </body>
  </html>
@endsection
