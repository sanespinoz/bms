<div class="col-sm-6">

	<div class="form-group">
		{!! Form::text('name', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:','required']) !!}
				<!--VALIDACION -->

		@if($errors->has('name'))

			<p class="text-danger">{{ $errors->first('name') }}</p>
		@endif

		<!--VALIDACION -->

	</div>


	<select class ="form-control floating-label" name="rol_id">
	@foreach($rols as $rol)

			<option value="{{ $rol->id }}">{{ $rol->rol }}</option>

	@endforeach
	</select>



</div>
