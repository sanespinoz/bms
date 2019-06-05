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
    <li class="breadcrumb-item active" aria-current="page">Instalar un grupo de luminarias</li>
  </ol>
</nav>
@section('content')
<html>
<head>
</head>
<body>
<div  align="left" class="container">
<div class="container-fluid">
<h2>Registrar Grupo</h2>
</div>
<div class="container-fluid col-md-6">
{!! Form::open(['route'=>'grupo.store']) !!}
{!! csrf_field() !!}
<br>
	@include('grupo.partials.form')
<div class="form-group col-xs-6">
    {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
{!! Form::close() !!}
</div>
</div>
</body>
</html>
@endsection

@section('scripts')
	{!!Html::script('js/dropdown.js') !!}

@endsection
