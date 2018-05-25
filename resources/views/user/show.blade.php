@extends('layouts.admin')
	@section('content')
        <div class="form-group col-xs-12">
            <h2>Datos del usuario {{$user->name}} </h2>
            Rol:
            {{$user->rol->rol}}


        </div>
    @endsection
