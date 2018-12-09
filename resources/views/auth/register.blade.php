@extends('layouts.principal')
 
@section('register')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registro
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'register', 'class' => 'form']) !!}
                    <div class="form-group">
                        <label>
                            Nombre
                        </label>
                        {!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            Email
                        </label>
                        {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            Contraseña
                        </label>
                        {!! Form::password('password', ['class'=> 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>
                            Confirmación de Contraseña
                        </label>
                        {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                    </div>
                    <div>
                        {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
