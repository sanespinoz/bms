@extends('auth.template')

@section('content')
<h2 class="text-center">
    Cambiar Contraseña
</h2>
<form action="{{ url('/password/reset') }}" method="POST" role="form">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input name="token" type="hidden" value="{{ $token }}">
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
            </div>
            <div class="row">
                <div class="form-group col-lg-6 {{ $errors->has('password')? 'has-error' : '' }}">
                    <input class="form-control" name="password" placeholder="Contraseña" required="" type="password">
                        {!! $errors->first('password', '
                        <small class="help-block">
                            :message
                        </small>
                        ') !!}
                    </input>
                </div>
                <div class="form-group col-lg-6">
                    <input class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" type="password">
                    </input>
                </div>
                <div class="form-group col-lg-12 text-center">
                    <input class="btn btn-default" type="submit" value="Cambiar Contraseña">
                    </input>
                </div>
            </div>
        </input>
    </input>
</form>
@stop
