@extends('layouts.mantenimiento')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item">{!! link_to(URL::previous(), 'Estado de la luminaria') !!}</li>
    <li class="breadcrumb-item active" aria-current="page">Edición del estado de la luminaria</li>
  </ol>
</nav>
@section('content')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.success')
<html>
<head>
</head>
<body>
<div align="left" class="container">
<div class="container-fluid">
<h2>
    Editar el Estado de la Luminaria
</h2>
</div>
<br>

<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
{!! Form::open(['route'=>'estadoluminaria.store']) !!}
{!!Form::model($estadoluminaria)!!}
{!! csrf_field() !!}
<br>
<div class="form-group">
    <div class="form-group row">
        {!! Form::label('est','Estado', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::select('estado',['1' => 'Activa', '0' => 'Inactiva','2' => 'Falla','3' => 'Mantenimiento'],old('estado'),['placeholder' => 'Selecciona Estado'])!!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('lumin', 'Luminaria', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('luminaria_id',old('luminaria_id'), ['class'=>'form-control floating-label']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('obs', 'Observación', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::textarea('observacion',old('observacion'), ['class'=>'form-control floating-label', 'rows' => '3', 'cols' => '54']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('fech', 'Fecha de Actualización', ['class'=>'col-sm-3 col-form-label']) !!}
       <div class="col-sm-7">
        <div class="input-group">
            {!! Form::text('fecha',old('fecha'), ['id'=>'fecha','class'=>'form-control floating-label datepicker']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
        <p id="msg" style ="font-weight: bold;"></p>

    </div>
     </div>
</div>
<br>
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}

{!! Form::close() !!}
{!! Form::close() !!}
</div>
</div>
<script>
    $(document).ready(function(){
                $("#fecha").focus(function(){
                    $('#msg').html('');
                });
                $("#fecha").blur(function(){
                    var hoy = new Date();
                    var fecha = $('#fecha').val();
                    var fechaFormulario = Date.parse(fecha);
                    
                    if (hoy <= fechaFormulario) {
                        $('#msg').html("Fecha Válida");
                    } else {
                        $('#msg').html("Fecha Pasada, no válida");
                    }
                });
            });
</script>
</body>
</html>
@endsection

