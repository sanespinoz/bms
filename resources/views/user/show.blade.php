@extends('layouts.admin')
    @section('content')
<div class="form-group col-xs-12">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos del usuario {{$user->name}}
                    </div>
                    <div class="panel-body">
                        <p>
                            Correo electrónico: {{$user->email}}
                        </p>
                        <p>
                            Rol: {{$user->rol->rol}}
                        </p>
                        <p>
                            Fecha y hora del último acceso: {{$user->last_login_at}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-xs-12">
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
    </div>
</div>
@endsection
