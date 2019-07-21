<div class="form-group">
    <div class="form-group">
        {!! Form::text('codigo',  old('codigo'), ['class'=>'form-control floating-label','placeholder'=>'Código:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('marca',  old('marca'), ['class'=>'form-control floating-label','placeholder'=>'Marca:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('tipo',  old('tipo'), ['class'=>'form-control floating-label', 'placeholder'=>'Tipo:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('nombre',  old('nombre'), ['class'=>'form-control floating-label', 'placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion',  old('descripcion'), ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        <select class="form-control" id="estado" name="estado">
            <option value="" {{ old('estado') == '' ? 'selected' : '' }}>Selecciona el Estado</option>
            <option value="a" {{ old('estado') == 'a' ? 'selected' : '' }}>Activo</option>
            <option value="i" {{ old('estado') == 'i' ? 'selected' : '' }}>Inactivo</option>
            <option value="f" {{ old('estado') == 'f' ? 'selected' : '' }}>Falla</option>
            <option value="m" {{ old('estado') == 'm' ? 'selected' : '' }}>Mantenimiento</option>
        </select>
    </div>
    <div class="form-group">
        <div class="input-group">
            {!! Form::text('fecha_alta', old('fecha_alta'), ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Alta:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos, old('piso_id'),['class'=>'form-control floating-label', 'id'=>'piso_id']) !!}
    </div>
        <div class="form-group">
        {!! Form::select('sector_id',['placeholder'=>'Selecciona un sector'],old('sector_id'),['class'=>'form-control floating-label', 'id'=>'sector_id']) !!}
    </div>
</div>
