@extends('layouts.admin')
@section('content')

@include('alerts.request')
<h1>
    Registrar Luminaria
</h1>
{!! Form::open(['route'=>'luminaria.store']) !!}
{!! csrf_field() !!}
    @include('luminaria.partials.form')
<div class="form-group col-xs-12">
    {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
{!! Form::close() !!}
@endsection

@section('scripts')  
   
    {!! Html::script('js/lumi.js') !!}
    {!! Html::script('js/lumigroup.js') !!} 
    {!! Html::script('js/datepick.js') !!}

@endsection
