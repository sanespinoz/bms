<div class="form-group">
    <div class="form-group row">
        {!! Form::label('ape', 'Apellido', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('apellido' ,old('apellido'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre' ,old('nombre'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nam', 'Nombre de usuario', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
       {!! Form::text('name', null, ['class'=>'form-control floating-label']) !!}
          </div>
    </div>
     <div class="form-group row">
        {!! Form::label('ema', 'Correo electrónico', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('email', null, ['class'=>'form-control floating-label']) !!}
         </div>
    </div>
    <div class="form-group row">
        {!! Form::label('contra', 'Contraseña', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::password('password',null,['class'=>'form-control floating-label','placeholder'=>'Ingrese la password'])!!}
         </div>
    </div>
    <div class="form-group row">
        {!! Form::label('roid', 'Rol', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::select('rol_id',$rols, $userid,['id'=>'rol_id','class'=>'form-control']) !!}
        </div>
    </div>
</div>
