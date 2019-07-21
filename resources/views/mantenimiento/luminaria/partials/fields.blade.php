<div class="container-fluid  col-sm-10 col-md-10 col-lg-10">
    <div class="form-group row">
        {!! Form::label('serie','N° de serie:', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('codigo', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre' ,old('nombre'),['class'=>'form-control', 'id'=>'nombre']) !!}
        <div id="nombreList">
        </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('tnombre','Tipo', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('tipo',old('tipo'),['class'=>'form-control', 'id'=>'tipo']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('descrip', 'Descripción', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('descripcion',old('descripcion'),['class'=>'form-control','id'=>'descripcion']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('dimen', 'Dimensiones', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('dimensiones',old('dimensiones'),['class'=>'form-control','id'=>'dimensiones']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('voltaje', 'Voltaje Nominal', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('voltaje_nominal', old('voltaje_nominal'), ['class'=>'form-control','id'=>'voltaje_nominal']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('potencia', 'Potencia Nominal', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('potencia_nominal', old('potencia_nominal'), ['class'=>'form-control','id'=>'potencia_nominal']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('corriente', 'Corriente Nominal', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('corriente_nominal',old('corriente_nominal'), ['class'=>'form-control','id'=>'corriente_nominal']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('fecha_a', 'Fecha Instalación', ['class'=>'col-sm-3 col-form-label']) !!}
       <div class="col-sm-7">
        <div class="input-group">

            {!! Form::text('fecha_alta',null, ['class'=>'form-control floating-label datepicker']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('vida', 'Vida Útil', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('vida_util',old('vida_util'),['class'=>'form-control','id'=>'corriente_nominal'])!!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('temp', 'Temperatura Color', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('temperatura',old('temperatura'),['class'=>'form-control','id'=>'temperatura'])!!}
    </div>
    </div>
    <div class="form-group row">
     {!! Form::label('pis', 'Piso', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::select('piso_id',$pisos, $p,['id'=>'piso_id','class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
    {!! Form::label('sec', 'Sector', ['class'=>'col-sm-3 col-form-label']) !!}
    <div class="col-sm-7">
    {!! Form::select('sector_id',$sectdelp,$s ,['id'=>'sector_id','class'=>'form-control']) !!}
         </div>
    </div>
   <div class="form-group row">
    {!! Form::label('group', 'Grupo', ['class'=>'col-sm-3 col-form-label']) !!}
    <div class="col-sm-7">
    {!! Form::select('grupo_id',$gruposdelp,old('grupo_id'),['id'=>'grupo_id','class'=>'form-control']) !!}
             </div>
    </div>
</div>