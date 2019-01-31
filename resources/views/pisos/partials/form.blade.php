<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
    </div>
    <div class="form-group">
        <select class="form-control floating-label" name="edificio_id">
            @foreach($edificios as $edificio)
            <option value="{{ $edificio->id }}">
                {{ $edificio->nombre }}
            </option>
            @endforeach
        </select>
    </div>
</div>