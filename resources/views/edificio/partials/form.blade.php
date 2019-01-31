<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('direccion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Dirección:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('telefono', null, ['class'=>'form-control floating-label', 'placeholder'=>'(0342) xxxxxxx']) !!}
    </div>
    <div class="form-group">
        {!! Form::email('email', null, ['class'=>'form-control floating-label', 'placeholder'=>'Correo Electrónico:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('ciudad', null, ['class'=>'form-control floating-label', 'placeholder'=>'Ciudad:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('provincia', null, ['class'=>'form-control floating-label', 'placeholder'=>'Provincia:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('codigo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Código Postal:']) !!}
    </div>
</div>
