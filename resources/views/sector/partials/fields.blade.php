<div class="container-fluid  col-sm-10 col-md-10 col-lg-10">
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('descrip', 'Descripción', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('descripcion',old('descripcion'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
     {!! Form::label('pis', 'Piso', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::select('piso_id',$pisos, $p,['id'=>'piso_id','class'=>'form-control']) !!}
        </div>
    </div>
  <!--  <div class="form-group row">
        {!! Form::label('cantp', 'Cantidad de personas', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!!Form::text('Cant. personas',old('cant_personas'),['class'=>'form-control'])!!}
    </div> -->
    </div>
</div>
