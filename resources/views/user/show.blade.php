@extends('layouts.admin')
    @section('content')
<div class="form-group col-xs-12">
    <h2>
        Datos del usuario {{$user->name}}
    </h2>
    <div class="form-group">
        Correo electrónico: {{$user->email}}
    </div>
    <div class="form-group">
        Rol: {{$user->rol->rol}}
    </div>
    <div class="form-group">
        Fecha y hora del último acceso: {{$user->last_login_at}}
    </div>
    <div class="form-group col-xs-12">
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
    </div>
    @endsection
</div>