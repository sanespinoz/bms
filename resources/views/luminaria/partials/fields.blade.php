<div class="col-sm-6">
    <div class="form-group">
        {!! Form::label('codigo', 'Código') !!}
        {!! Form::text('codigo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Código:']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::select('nombre' ,['Ledvance Area Panel 600x600' => 'Ledvance Area Panel 600x600', 'Ledvance Area DALI 600x600' => 'Ledvance Area DALI 600x600','Ledvalux Downlight L WT 830' => 'Ledvalux Downlight L WT 830', 'Led SMD 5050' => 'Led SMD 5050'],old('nombre'),['placeholder' => 'Selecciona Nombre  ']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Tipo') !!}
        {!!Form::select('tipo',['LED Panel' => 'LED Panel', 'LED Panel Dimerizable' => 'LED Panel Dimerizable','ED Direccional' => 'ED Direccional', 'ED Tira 3m' => 'ED Tira 3m'],old('tipo'),['placeholder' => 'Selecciona Tipo  '])!!}
    </div>
    <div class="form-group">
        {!! Form::label('descripcion', 'Descripción') !!}
        {!!Form::select('descripcion',['Panel LED' => 'Panel LED', 'Panel Led dimerizable con conexión DALI' => 'Panel Led dimerizable con conexión DALI', 'Led Downlight' => 'Led Downlight','Led Tira SMD 5050' => 'Led Tira SMD 5050'],old('descripcion'),['placeholder' => 'Selecciona la descripción  '])!!}
    </div>
    <div class="form-group">
        {!! Form::label('dimensiones', 'Dimensiones') !!}
        {!!Form::select('dimensiones',['600x600x10' => '600x600x10', '600x600x56' => '600x600x56','172x72' => '172x72', '3000x6,5' => '3000x6,5'],old('dimensiones'),['placeholder' => 'Selecciona las dimensiones  '])!!}
    </div>
    <div class="form-group">
        {!! Form::label('voltaje_nominal', 'Voltaje Nominal') !!}
        {!! Form::text('voltaje_nominal', 220, ['class'=>'form-control floating-label', 'placeholder'=>'Voltaje Nominal:']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('potencia_nominal', 'Potencia Nominal') !!}
        {!! Form::text('potencia_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Potencia Nominal:']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('corriente_nominal', 'Corriente Nominal') !!}
        {!! Form::text('corriente_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Corriente Nominal:']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_alta', 'Fecha de Instalación') !!}
        <div class="input-group">
            {!! Form::text('fecha_alta',null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Alta:']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('vida_util', 'Vida Útil') !!}
        {!!Form::select('vida_util',['20000' => '20000', '30000' => '30000','40000' => '40000', '50000' => '50000'],old('vida_util'),['placeholder' => 'Selecciona hs de Vida útil  '])!!}
    </div>
    <div class="form-group">
        {!! Form::label('temperatura', 'Temperatura Color') !!}
        {!!Form::select('temperatura',['4000' => '4000', '3000' => '3000'],old('temperatura'),['placeholder' => 'Selecciona Temperatura Color  '])!!}
    </div>
    <div class="form-group">
        {!! Form::select('piso_id',$pisos, $p,['id'=>'piso_id']) !!}
    {!! Form::select('sector_id',$sectdelp,$s ,['id'=>'sector_id']) !!}

    {!! Form::select('grupo_id',$gruposdelp,old('grupo_id'),['id'=>'grupo_id']) !!}
    </div>
</div>