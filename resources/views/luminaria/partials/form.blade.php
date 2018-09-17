<div class="col-sm-6">

	<div class="form-group">
		{!! Form::text('identificacion', null, ['class'=>'form-control floating-label','placeholder'=>'identificacion:','required']) !!}
				<!--VALIDACION -->

		@if($errors->has('identificacion'))

			<p class="text-danger">{{ $errors->first('identificacion') }}</p>
		@endif

		<!--VALIDACION -->
		
	</div>
	<div class="form-group">
		{!! Form::text('codigo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Código:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('nombre', null, ['class'=>'form-control floating-label', 'placeholder'=>'Nombre:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('tipo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Tipo:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::textarea('descripcion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Descripción:']) !!}
		
	</div>
		<div class="form-group">
		{!! Form::text('dimensiones', null, ['class'=>'form-control floating-label', 'placeholder'=>'Dimensiones:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('voltaje_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Voltaje Nominal:']) !!}
		
	</div>
		<div class="form-group">
		{!! Form::text('potencia_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Potencia Nominal:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('corriente_nominal', null, ['class'=>'form-control floating-label', 'placeholder'=>'Corriente Nominal:']) !!}		
	</div>
	 <div class="form-group">
		<div class="input-group">
		      
		       {!! Form::text('fecha_alta', null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Alta:']) !!}
		
		          <div class="input-group-addon">
		              <span class="glyphicon glyphicon-th"></span>
		          </div>                         
        </div>
	</div>
    <div class="form-group">
		<div class="input-group">
		      
		       {!! Form::text('fecha_baja', null, ['class'=>'form-control floating-label datepicker', 'placeholder'=>'Fecha de Baja:']) !!}
		
		          <div class="input-group-addon">
		              <span class="glyphicon glyphicon-th"></span>
		          </div>                         
        </div>
	</div>


	<div class="form-group">
		{!! Form::text('vida_util', null, ['class'=>'form-control floating-label', 'id'=>'vida','placeholder'=>'Vida Útil:']) !!}		
	</div>
	<div class="form-group">
		
	
        <select class="form-control" name="estado" id="estado">
        <option value="">Selecciona Estado</option>
          <option value="a">Activa</option>
            <option value="i">Inactiva</option>
            
           
        </select>
  		</div>

	<div class="form-group">
		{!! Form::select('piso_id',$pisos,null,['id'=>'pisol_id']) !!}
		{!! Form::select('sector_id',['placeholder'=>'Selecciona'],null,['id'=>'sec']) !!}
		{!! Form::select('grupo_id',['placeholder'=>'Selecciona'],null,['id'=>'grupol_id']) !!}
	</div>
	

</div>