<div class="form-group">
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre' ,old('nombre'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('descrip', 'Descripción', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::textarea('descripcion', old('descripcion'), ['class'=>'form-control floating-label', 'rows'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('direc', 'Dirección', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('direccion' ,old('direccion'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('tel', 'Teléfono', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('telefono',old('direccion'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('emai', 'Correo Electrónico', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('ciud', 'Ciudad', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('ciudad',old('ciudad'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('ciud', 'Provincia', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('provincia',old('provincia'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('ciud', 'CP', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('codigo',old('codigo'),['class'=>'form-control']) !!}
        </div>
    </div>
</div>
