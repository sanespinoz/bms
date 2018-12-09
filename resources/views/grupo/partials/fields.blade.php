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
        {!! Form::text('energia_consumida', null, ['class'=>'form-control floating-label', 'placeholder'=>'Energía Consumida:']) !!}
    </div>
    {{--
    <div class="form-group">
        {!! Form::text('sector_id', null, ['class'=>'form-control floating-label', 'placeholder'=>'Sector:']) !!} --}}
        <select class="form-control floating-label" name="sector_id" placeholder="Sector:">
            @foreach($sectores as $sector)
            <option 'selected'="" ;="" <?php="" ?="" echo="" if($sector['id']="$grupo['sector_id'])" value="{{ $sector->id }} ">
                >{{ $sector->nombre }}
            </option>
            @endforeach
        </select>
    </div>
</div>