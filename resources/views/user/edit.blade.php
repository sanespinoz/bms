@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
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
<div align="left" class="container">
<div class="container-fluid">
<br>
<h2>
    Editar usuario
</h2>
</div>
<br>
<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">

    {!!Form::model($user,['route'=> ['user.update',$user->id],'method'=>'PUT',$rols,$rolse])!!}
      <br>
            @include('user.partials.fields')
              <br>
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}

{!! Form::close() !!}
</div>
</div>
</body>
</html>

@endsection
