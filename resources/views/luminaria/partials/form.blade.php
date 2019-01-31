<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('codigo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Código:']) !!}
    </div>
    <div class="form-group">
        <select class="form-control" id="nombre" name="nombre">
            <option value="">
                Selecciona Nombre
            </option>
            <option value="Ledvance Area Panel 600x600">
                Ledvance Area Panel 600x600
            </option>
            <option value="Ledvance Area DALI 600x600">
                Ledvance Area DALI 600x600
            </option>
            <option value="Ledvalux Downlight L WT 830">
                Ledvalux Downlight L WT 830
            </option>
            <option value="Led SMD 5050">
                Led SMD 5050
            </option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" id="tipo" name="tipo">
            <option value="">
                Selecciona Tipo
            </option>
            <option value="LED Panel">
                LED Panel
            </option>
            <option value="LED Panel Dimerizable">
                LED Panel Dimerizable
            </option>
            <option value="LED Direccional">
                LED Direccional
            </option>
            <option value="LED Tira 3m">
                LED Tira 3m
            </option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" id="descripcion" name="descripcion">
            <option value="">
                Descripcion
            </option>
            <option value="Panel LED">
                Panel LED
            </option>
            <option value="Panel Led dimerizable con conexión DALI">
                Panel Led dimerizable con conexión DALI
            </option>
            <option value="Led Downlight">
                Led Downlight
            </option>
            <option value="Led Tira SMD 5050">
                Led Tira SMD 5050
            </option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" id="dimensiones" name="dimensiones">
            <option value="">
                Selecciona las dimensiones
            </option>
            <option value="600x600x10">
                600x600x10
            </option>
            <option value="600x600x56">
                600x600x56
            </option>
            <option value="172x72">
                172x72
            </option>
            <option value="3000x6,5">
                3000x6,5
            </option>
        </select>
    </div>
    <div class="form-group">
        {!! Form::text('voltaje_nominal', 220, ['class'=>'form-control floating-label', 'placeholder'=>'Voltaje Nominal:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('potencia_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Potencia Nominal:']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('corriente_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Corriente Nominal:']) !!}
    </div>
    <div class="form-group">
        <div class="input-group">
            {!! Form::text('fecha_alta',null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Alta:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control" id="vida_util" name="vida_util">
            <option value="">
                Selecciona hs de Vida útil
            </option>
            <option value="20000">
                20000
            </option>
            <option value="30000">
                30000
            </option>
            <option value="40000">
                40000
            </option>
            <option value="50000">
                50000
            </option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" id="temperatura" name="temperatura">
            <option value="">
                Selecciona Temperatura Color
            </option>
            <option value="4000">
                4000
            </option>
            <option value="3000">
                3000
            </option>
        </select>
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos,null,['id'=>'piso_id']) !!}
    {!! Form::select('sector_id',['placeholder'=>'Selecciona'],null,['id'=>'sector_id']) !!}
    {!! Form::select('grupo_id',['placeholder'=>'Selecciona'],null,['id'=>'grupo_id']) !!}
    </div>
</div>