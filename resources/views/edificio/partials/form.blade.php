<div class="col-sm-6">

	<div class="form-group">
		{!! Form::text('nombre', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:','required']) !!}
				<!--VALIDACION -->

		@if($errors->has('nombre'))

			<p class="text-danger">{{ $errors->first('nombre') }}</p>
		@endif

		<!--VALIDACION-->
		
	</div>
	<div class="form-group">
		{!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'rows'=>'8', 'placeholder'=>'Descripción:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('direccion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Dirección:']) !!}

			@if($errors->has('direccion'))

			<p class="text-danger">{{ $errors->first('direccion') }}</p>
		@endif
		
	</div>
	<div class="form-group">
		{!! Form::number('telefono', null, ['class'=>'form-control floating-label', 'placeholder'=>'Teléfono:']) !!}

	</div>
	<div class="form-group">
		{!! Form::email('email', null, ['class'=>'form-control floating-label', 'placeholder'=>'Correo Electrónico:']) !!}

	</div>

	<div class="form-group">
		{!! Form::text('ciudad', null, ['class'=>'form-control floating-label', 'placeholder'=>'Ciudad:']) !!}

	</div>
	<div class="form-group">
		{!! Form::text('provincia', null, ['class'=>'form-control floating-label', 'placeholder'=>'Provincia:']) !!}

	</div>
	<div class="form-group">
		{!! Form::number('codigo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Código Postal:']) !!}

	</div>

	{{-- </div> --}}


</div>