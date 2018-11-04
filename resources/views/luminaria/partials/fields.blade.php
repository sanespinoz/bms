<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('identificacion', null, ['class'=>'form-control floating-label','placeholder'=>'identificacion:','required']) !!}
        <!--VALIDACION -->
        @if($errors->has('identificacion'))
        <p class="text-danger">
            {{ $errors->first('identificacion') }}
        </p>
        @endif
        <!--VALIDACION -->
        <!--VALIDACION  HACERRR QUE LA FECHA DE BAJA SEA POSTERIOR A LA FECHA DE ALTA y menor a la fecha actual-->
    </div>
    <div class="form-group">
        {!! Form::text('ubicacion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Ubicación:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('marca', null, ['class'=>'form-control floating-label', 'placeholder'=>'Marca:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('tipo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Tipo:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('denominacion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Denominación:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('cant_lamparas', null, ['class'=>'form-control floating-label', 'placeholder'=>'Cantidad de Lámparas:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('consumo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Consumo:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('tiempo_uso', null, ['class'=>'form-control floating-label', 'placeholder'=>'Tiempo de Uso:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('grupo_id', null, ['class'=>'form-control floating-label', 'placeholder'=>'Grupo:']) !!}
        <select class="form-control floating-label" name="grupo_id">
            @foreach($grupos as $grupo)
            <option 'selected'="" ;="" <?php="" ?="" echo="" if($grupo['id']="$luminaria['grupo_id'])" value="{{ $grupo->id }} ">
                >{{ $grupo->nombre }}
            </option>
            @endforeach
        </select>
    </div>
</div>
