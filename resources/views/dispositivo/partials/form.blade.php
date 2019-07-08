<div class="form-group">
    <div class="form-group">
        {!! Form::text('codigo', null, ['class'=>'form-control floating-label','placeholder'=>'Código:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('marca', null, ['class'=>'form-control floating-label','placeholder'=>'Marca:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('tipo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Tipo:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label', 'placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
   {{-- <div>
       
        {{ Form::hidden('catatogo_id', '', array('id' => 'catalogo_id')) }}
    </div> --}} 
    <div class="form-group">
        <select class="form-control" id="estado" name="estado">
            <option value="">
                Selecciona el Estado
            </option>
            <option value="a">
                Activo
            </option>
            <option value="i">
                Inactivo
            </option>
            <option value="f">
                Falla
            </option>
            <option value="m">
                Mantenimiento
            </option>
        </select>
    </div>
    <div class="form-group">
        <div class="input-group">
            {!! Form::text('fecha_alta',null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Alta:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos,null,['class'=>'form-control floating-label', 'id'=>'piso_id']) !!}
    </div>
        <div class="form-group">
        {!! Form::select('sector_id',['placeholder'=>'Selecciona un sector'],null,['class'=>'form-control floating-label', 'id'=>'sector_id']) !!}
    </div>
</div>
