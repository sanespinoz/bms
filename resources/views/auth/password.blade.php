@extends('auth.template')

@section('content')
<h2 class="text-center">
    Cambiar Contraseña
</h2>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<form action="{{ url('password/email') }}" method="POST" role="form">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group col-lg-6 {{ $errors->has('email')? 'has-error' : '' }}">
                <input class="form-control" name="email" placeholder="Correo Electrónico" required="" type="email" value="{{ old('email') }}">
                    {!! $errors->first('email', '
                    <small class="help-block">
                        :message
                    </small>
                    ') !!}
                </input>
            </div>
            <div class="form-group col-lg-6 text-center">
                <input class="btn btn-default" type="submit" value="Send dsada">
                </input>
            </div>
        </div>
    </input>
</form>
@stop
