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
    <li class="breadcrumb-item active" aria-current="page">Registar Sector</li>
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
    <h2>Registrar Sector</h2>
    </div>
<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
{!! Form::open(['route'=>'sector.store']) !!}
 {!! csrf_field() !!}
<br>
@include('sector.partials.form')
<br>

{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
{!! Form::close() !!}
</div>
</div>
</body>
</html>
@endsection

