@extends('layouts.admin')
	@section('content')
        <div class="form-group col-xs-12">
            <h2>Datos del usuario {{$user->name}} </h2>
						<div class="from-group">
							Correo electrónico:
							{{$user->email}}
						</div>
						<div class="Form-group">
							Rol:
							{{$user->rol->rol}}
						</div>
        </div>
    @endsection
