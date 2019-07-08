<div class="form-group">
    <div class="form-group">
        {!! Form::text('apellido', null, ['class'=>'form-control floating-label','placeholder'=>'Apellido:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
        <div class="form-group">
            {!!Form::text('name', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre de usuario:'])!!}
        </div>
        <div class="form-group">
            {!!Form::text('email',null,['class'=>'form-control floating-label','placeholder'=>'Correo electrónico:'])!!}
        </div>
        <div class="form-group">
            {!!Form::password('password',['class'=>'form-control floating-label','placeholder'=>'Contraseña:'])!!}
        </div>
        <div class="form-group" placeholder="Rol">
            <select class="form-control" name="rol_id">
                @foreach($rols as $rol)
                <option value="{{ $rol->id }}">
                    {{ $rol->rol }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

