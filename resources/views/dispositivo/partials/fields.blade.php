<div class="col-sm-4">
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
        {!! Form::text('descripcion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Descripcion:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('estado', null, ['class'=>'form-control floating-label', 'placeholder'=>'Estado:']) !!}
        <select class="form-control" id="estado" name="estado">
            <option value="a">
                Activo
            </option>
            <option value="i">
                Inactivo
            </option>
            <option value="f">
                Falla
            </option>
        </select>
    </div>
    <div class="form-group">
        {!! Form::text('fecha_baja', null, ['class'=>'form-control floating-label', 'placeholder'=>'Fecha de Instalación:']) !!}
        <div class="input-group date" id="fecha_baja">
            <input class="form-control" id="fecha_baja" name="fecha_baja" type="text"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar">
                </span>
            </span>
        </div>
        <div class="form-group">
            {!! Form::text('sector_id', null, ['class'=>'form-control floating-label', 'placeholder'=>'Sector:']) !!}
            <select class="form-control floating-label" name="sector_id">
                @foreach($sectores as $sector)
                <option 'selected'="" ;="" <?php="" ?="" echo="" if($sector['id']="$sector['sector_id'])" value="{{ $sector->id }} ">
                    >{{ $sector->nombre }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>