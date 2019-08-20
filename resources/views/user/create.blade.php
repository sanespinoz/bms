@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
            ×
        </span>
    </button>
    {{Session::get('message')}}
</div>
@endif
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
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
<div class="container-fluid">
<br>
<h2>Registrar Usuario</h2>
<br>
</div>
<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
                {!!Form::open(['route'=>'user.store', 'method'=>'POST'])!!}
                <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <br>
                @include('user.partials.form')
                <br>
                {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}

{!! Form::close() !!}
</div>
</div>
</body>
</html>
@endsection
