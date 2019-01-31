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
    <select class="form-control floating-label" name="piso_id">
        @foreach($pisos as $piso)
        <option <?php="" if($piso['id']="$sector['piso_id']);" value="{{ $piso->id }}">
            {{ $piso->nombre }}
        </option>
        @endforeach
    </select>
</div>
