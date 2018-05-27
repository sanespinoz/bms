<div class="col-sm-6">

	<div class="form-group">
		{!! Form::text('name', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:','required']) !!}
				<!--VALIDACION -->
		@if($errors->has('name'))
		<p class="text-danger">{{ $errors->first('name') }}</p>
		@endif
	</div>
	<div class="form-group">
		{!!Form::text('email',null,['class'=>'form-control floating-label','placeholder'=>'Ingresa el correo electrónico','required'])!!}
		<!--VALIDACION -->
		@if($errors->has('email'))
		<p class="text-danger">{{ $errors->first('email') }}</p>
		@endif
	</div>
	<div class="form-group">
		{!!Form::password('password',['class'=>'form-control floating-label','placeholder'=>'Ingresa la password'])!!}
		<!--VALIDACION -->
		@if($errors->has('password'))
		<p class="text-danger">{{ $errors->first('password') }}</p>
		@endif
	</div>
	<div class="form-group">
	<select class ="form-control floating-label"  name="rol_id">
	@foreach($rols as $rol)
			<option value="{{ $rol->id }}">{{ $rol->rol }}</option>
	@endforeach
	</select>
	</div>


</div>
