<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('codigo', null, ['class'=>'form-control floating-label', 'placeholder'=>'N. Serie:']) !!}
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="nombre" name="nombre" placeholder="Nombre:" type="text"/>
        <div id="nombreList">
        </div>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="tipo" name="tipo" placeholder="Tipo:" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="descripcion" name="descripcion" placeholder="Descripción:" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="dimensiones" name="dimensiones" placeholder="Dimensiones:" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="voltaje_nominal" name="voltaje_nominal" placeholder="Voltaje nominal:" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="potencia_nominal" name="potencia_nominal" placeholder="Potencia nominal:" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="corriente_nominal" name="corriente_nominal" placeholder="Corriente nominal:" type="text"/>
    </div>
    <div class="form-group">
        <div class="input-group">
            {!! Form::text('fecha_alta',null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de alta:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="vida_util" name="vida_util" placeholder="Vida útil:" type="text"/>
    </div>
    <div class="form-group">
        <input class="form-control floating-label" id="temperatura" name="temperatura" placeholder="Temperatura color:" type="text"/>
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos,null,['id'=>'piso_id']) !!}
        {!! Form::select('sector_id',['placeholder'=>'Selecciona'],null,['id'=>'sector_id']) !!}
        {!! Form::select('grupo_id',['placeholder'=>'Selecciona'],null,['id'=>'grupo_id']) !!}
    </div>
    {{ csrf_field() }}
</div>