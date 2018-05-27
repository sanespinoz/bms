<div class="col-sm-6">

	<div class="form-group">
		{!! Form::text('name', null, ['class'=>'form-control floating-label','required']) !!}
				<!--VALIDACION -->
		@if($errors->has('name'))
		<p class="text-danger">{{ $errors->first('name') }}</p>
		@endif
	</div>
	<div class="form-group">
		{!! Form::text('email', null, ['class'=>'form-control floating-label','required']) !!}
				<!--VALIDACION -->
		@if($errors->has('email'))
		<p class="text-danger">{{ $errors->first('email') }}</p>
		@endif
	</div>
	 <div class="form-group">
	 <select class ="form-control floating-label" name="rol_id">
	@foreach($rols as $rol)
			<option value="{{ $rol->id }}" <?php if($rol['id']==$user['rol_id']) echo 'selected' ; ?>>{{ $rol->rol}}</option>
	@endforeach
	</select>
	</div>
</div>
