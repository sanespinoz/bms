<div class="form-group">
    <div class="form-group">
        {!! Form::text('codigo', old('codigo'), ['class'=>'form-control floating-label', 'placeholder'=>'N. Serie:']) !!}
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="nombre" name="nombre" placeholder="Nombre:" type="text" value="{{ old('nombre') }}"/>
        <div id="nombreList">
        </div>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="tipo" name="tipo" placeholder="Tipo:" type="text" value="{{ old('tipo') }}"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="descripcion" name="descripcion" placeholder="Descripción:" type="text" value="{{ old('descripcion') }}"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="dimensiones" name="dimensiones" placeholder="Dimensiones:" type="text" value="{{ old('dimensiones') }}"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="voltaje_nominal" name="voltaje_nominal" placeholder="Voltaje nominal:" type="text" value="{{ old('voltaje_nominal') }}"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="potencia_nominal" name="potencia_nominal" placeholder="Potencia nominal:" type="text" value="{{ old('potencia_nominal') }}"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="corriente_nominal" name="corriente_nominal" placeholder="Corriente nominal:" type="text" value="{{ old('corriente_nominal') }}"/>
    </div>
    <div class="form-group">
        <div class="input-group">
            {!! Form::text('fecha_alta',old('fecha_alta'), ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de alta:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="vida_util" name="vida_util" placeholder="Vida útil:" type="text" value="{{ old('vida_util') }}"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="temperatura" name="temperatura" placeholder="Temperatura color:" type="text" value="{{ old('temperatura') }}"/>
    </div>
        <div class="form-group">
        {!! Form::select('piso_id',$pisos, old('piso_id'),['class'=>'form-control floating-label', 'id'=>'piso_id']) !!}
    </div>
        <div class="form-group">
        {!! Form::select('sector_id',['placeholder'=>'Selecciona un sector'],old('sector_id'),['class'=>'form-control floating-label', 'id'=>'sector_id']) !!}
    </div>
        <div class="form-group">
        {!! Form::select('grupo_id',['placeholder'=>'Selecciona un grupo'],old('grupo_id'),['class'=>'form-control floating-label', 'id'=>'grupo_id']) !!}
    </div>
</div>