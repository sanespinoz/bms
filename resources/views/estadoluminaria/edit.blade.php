@extends('layouts.admin')
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
        {!! Form::label('valor_regulacion', 'Valor de Regulación') !!}
        {!! Form::text('valor_regulacion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Valor de Regulación:']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('luminaria_id', 'Luminaria') !!}
        {!! Form::text('luminaria_id', null, ['class'=>'form-control floating-label', 'placeholder'=>'Id Luminaria:']) !!}
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
