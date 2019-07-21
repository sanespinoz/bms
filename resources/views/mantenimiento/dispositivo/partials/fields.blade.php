<div class="container-fluid  col-sm-10 col-md-10 col-lg-10">
    <div class="form-group row">
        {!! Form::label('serie','N° de serie:', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('codigo', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('marc','Marca', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('marca',old('marca'),['class'=>'form-control', 'id'=>'tipo']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('tnombre','Tipo', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('tipo',old('tipo'),['class'=>'form-control', 'id'=>'tipo']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre' ,old('nombre'),['class'=>'form-control', 'id'=>'nombre']) !!}
    </div>
    </div>
    <div class="form-group row">
        {!! Form::label('descrip', 'Descripción', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::textarea('descripcion', old('descripcion'), ['class'=>'form-control floating-label', 'rows'=>'3']) !!}
        </div>
    </div>
        <div class="form-group row">
     {!! Form::label('est', 'Estado', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::select('estado',$estados, $e,['id'=>'estado','class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('fecha_a', 'Fecha de Instalación', ['class'=>'col-sm-3 col-form-label']) !!}
       <div class="col-sm-7">
        <div class="input-group">

            {!! Form::text('fecha_alta',old('fecha_alta'), ['class'=>'form-control floating-label datepicker']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
        </div>
    </div>
        <div class="form-group row">
        {!! Form::label('fecha_b', 'Fecha de Desinstalación', ['class'=>'col-sm-3 col-form-label']) !!}
       <div class="col-sm-7">
        <div class="input-group">

            {!! Form::text('fecha_baja',null, ['class'=>'form-control floating-label datepicker']) !!}
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th">
                </span>
            </div>
        </div>
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
    </div>
