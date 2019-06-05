@extends('layouts.admin')
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
        

     {!! Form::open(['route'=>'estadoluminaria.store']) !!}
<div class="form-group col-xs-12">
    <div class="form-group">
        {!! Form::label('estado','Estado') !!}
        {!!Form::select('estado',['1' => 'Activa', '0' => 'Inactiva','2' => 'Falla'],old('estado'),['placeholder' => 'Selecciona Estado  '])!!}
    </div>
    <div class="form-group">
        {!! Form::text('on_off', null, ['class'=>'form-control floating-label', 'placeholder'=>'On Off:']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('luminaria_id', 'Luminaria') !!}
        {!! Form::text('luminaria_id', null, ['class'=>'form-control floating-label', 'placeholder'=>'Id Luminaria:']) !!}
    </div>
        <div class="form-group">
        {!! Form::label('observacion', 'Observación') !!}
        {!! Form::textarea('observacion', null, ['class'=>'form-control floating-label', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none','placeholder'=>'Observación:']) !!}
    </div>
    <div class="form-group">
        <div class="input-group">
            {!! Form::text('fecha',null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Actualización:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
    </div>
</div>
<div class="form-group col-xs-12">
    {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
{!! Form::close() !!}
@endsection
@section('scripts')
    {!!Html::script('js/dropdown.js') !!}

@endsection
