<div class="form-group">
    <div class="form-group">
        {!! Form::text('nombre', old('nombre'), ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', old('descripcion'), ['class'=>'form-control floating-label', 'rows'=>'3', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('cant_luminarias', old('cant_luminarias') , ['class'=>'form-control floating-label', 'placeholder'=>'Cantidad de Luminarias:']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos,old('$request->piso_id'),['class'=>'form-control floating-label', 'id'=>'piso_id']) !!}
    </div>
    <div class="form-group">
        {!! Form::select('sector_id',['placeholder'=>'Selecciona un sector'],old('$request->sector_id'),['class'=>'form-control floating-label', 'id'=>'sector_id']) !!}
    </div>

  </div>
