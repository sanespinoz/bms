<div class="form-group">
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre' ,old('nombre'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('descrip', 'Descripción', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::textarea('descripcion', old('descripcion'), ['class'=>'form-control floating-label', 'rows'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('cantlum', 'Cantidad de luminarias', ['class'=>'col-sm-3 col-form-label']) !!}
    <div class="col-sm-7">
        {!! Form::text('cant_luminarias', old('cant_luminarias'), ['class'=>'form-control floating-label']) !!}
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