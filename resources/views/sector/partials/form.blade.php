<div class="form-group">
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'3', 'placeholder'=>'Descripción:']) !!}
    </div>
     <div class="form-group">
    <select class="form-control floating-label" name="piso_id">
        @foreach($pisos as $piso)
        <option value="{{ $piso->id }}">
            {{ $piso->nombre }}
        </option>
        @endforeach
    </select>
    </div>
</div>