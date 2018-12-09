<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:','required']) !!}
        <!--VALIDACION -->
        @if($errors->has('nombre'))
        <p class="text-danger">
            {{ $errors->first('nombre') }}
        </p>
        @endif
        <!--VALIDACION -->
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('cant_luminarias', null, ['class'=>'form-control floating-label', 'placeholder'=>'Cantidad de Luminarias:']) !!}

			@if($errors->has('cant_luminarias'))
        <p class="text-danger">
            {{ $errors->first('cant_luminarias') }}
        </p>
        @endif
    </div>
    <div class="form-group">
        {!! Form::text('energia_consumida', null, ['class'=>'form-control floating-label', 'placeholder'=>'Energía consumida:']) !!}

			@if($errors->has('energia_consumida'))
        <p class="text-danger">
            {{ $errors->first('energia_consumida') }}
        </p>
        @endif
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos,null,['id'=>'piso_id']) !!}


{!! Form::select('sector_id',['placeholder'=>'Selecciona'],null,['id'=>'sector_id']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('cant_hs_activo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Hs activo:']) !!}

			@if($errors->has('cant_hs_activo'))
        <p class="text-danger">
            {{ $errors->first('cant_hs_activo') }}
        </p>
        @endif
    </div>
    <div class="form-group">
        {!! Form::text('cant_activaciones', null, ['class'=>'form-control floating-label', 'placeholder'=>'Activaciones:']) !!}

			@if($errors->has('cant_activaciones'))
        <p class="text-danger">
            {{ $errors->first('cant_activaciones') }}
        </p>
        @endif
    </div>
</div>
