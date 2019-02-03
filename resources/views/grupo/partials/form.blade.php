<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('cant_luminarias', null, ['class'=>'form-control floating-label', 'placeholder'=>'Cantidad de Luminarias:']) !!}
    </div>
    {{--
    <div class="form-group">
        {!! Form::text('energia_consumida', null, ['class'=>'form-control floating-label', 'placeholder'=>'Energía consumida:']) !!}
    </div>
    --}}
    <div class="form-group">
        {!! Form::select('piso_id',$pisos,null,['id'=>'piso_id']) !!}


        {!! Form::select('sector_id',['placeholder'=>'Selecciona'],null,['id'=>'sector_id']) !!}
    </div>
    {{--
    <div class="form-group">
        {!! Form::text('cant_hs_activo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Hs activo:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('cant_activaciones', null, ['class'=>'form-control floating-label', 'placeholder'=>'Activaciones:']) !!}
    </div>
    --}}
</div>
