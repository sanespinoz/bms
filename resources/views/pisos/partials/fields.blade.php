<div class="form-group">
    <div class="form-group row">
        {!! Form::label('nom', 'Nombre', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::text('nombre' ,old('nombre'),['class'=>'form-control']) !!}
        </div>
    </div>
				<!--VALIDACION 

		@if($errors->has('nombre'))

			<p class="text-danger">{{ $errors->first('nombre') }}</p>
		@endif

		<!--VALIDACION -->
    <div class="form-group row">
        {!! Form::label('descrip', 'Descripción', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::textarea('descripcion', old('descripcion'), ['class'=>'form-control floating-label', 'rows'=>'3']) !!}
        </div>
    </div>
    <div class="form-group row">
     {!! Form::label('edif', 'Edificio', ['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-7">
        {!! Form::select('edificio_id',$edificios, $e,['id'=>'edificio_id','class'=>'form-control']) !!}
        </div>
    </div>
</div>
