@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
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
                Editar el Estado de la Luminaria {{ $lumi->codigo }}
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
                        {!!Form::select('estado',['1' => 'Activa', '0' => 'Inactiva','2' => 'Fallo','3' => 'Mantenimiento'],old('estado'),['placeholder' => 'Selecciona Estado'])!!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('lumin', 'Luminaria', ['class'=>'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('luminaria_id',old('luminaria_id'), ['class'=>'form-control floating-label','disabled'=>'disabled']) !!}
                    </div>
                </div> 
                {!! Form::hidden('luminaria_id',old('luminaria_id')) !!} 
                <div class="form-group row">
                    {!! Form::label('obs', 'Observación', ['class'=>'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::textarea('observacion',old('observacion'), ['class'=>'form-control floating-label', 'rows' => '3', 'cols' => '54']) !!}
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

</body>
</html>
@endsection


