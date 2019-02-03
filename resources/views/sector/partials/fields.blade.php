<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('piso', 'Piso') !!}
        {!! Form::select('piso_id' ,$pisos ,old('piso_id'),['placeholder' => 'Selecciona Piso  ']) !!}
    </div>
</div>
