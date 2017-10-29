<div class="col-sm-4">

	<div class="form-group">
		{!! Form::text('marca', null, ['class'=>'form-control floating-label','placeholder'=>'Marca:','required']) !!}
				<!--VALIDACION -->

		@if($errors->has('marca'))

			<p class="text-danger">{{ $errors->first('marca') }}</p>
		@endif

		<!--VALIDACION -->
		
	</div>
	<div class="form-group">
		{!! Form::text('tipo', null, ['class'=>'form-control floating-label', 'placeholder'=>'Tipo:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('voltaje', null, ['class'=>'form-control floating-label', 'placeholder'=>'Voltaje:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('factor_potencia', null, ['class'=>'form-control floating-label', 'placeholder'=>'Factor de Potencia:']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::text('fecha_instalacion', null, ['class'=>'form-control floating-label', 'placeholder'=>'Fecha de Instalación:']) !!}
		
		<div class="input-group date"  id="fecha_instalacion">
                <input type="text" id="fecha_instalacion" name="fecha_instalacion" class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
	</div>

            


		<div class="form-group">
		{!! Form::text('potencia', null, ['class'=>'form-control floating-label', 'placeholder'=>'Potencia:']) !!}
		
	</div>
	</div>
	<div class="col-sm-4">
	<div class="form-group">
		{!! Form::text('vida', null, ['class'=>'form-control floating-label', 'id'=>'vida','name'=>'vida','placeholder'=>'Vida Util:']) !!}
		
	</div>
		<div class="form-group">
		{!! Form::text('horas_activas', null, ['class'=>'form-control floating-label','id'=>'horas_activas','name'=>'horas_activas', 'placeholder'=>'Horas Activas:']) !!}
		
	</div>
	
		<div class="form-group">
		{!! Form::text('tiempo_restante', null, ['class'=>'form-control floating-label', 'id'=>'tiempo_restante','name'=>'tiempo_restante','onmousedown'=>'resta()','placeholder'=>'Tiempo Restante:']) !!}
		
	</div>
	
		<div class="form-group">
		{!! Form::text('estado', null, ['class'=>'form-control floating-label', 'placeholder'=>'Estado:']) !!}
	
        <select class="form-control" name="estado" id="estado">
          <option value="activa">Activa</option>
            <option value="inactiva">Inactiva</option>
            
           
        </select>
  		</div>

	<div class="form-group">
	{!! Form::text('luminaria_id', null, ['class'=>'form-control floating-label', 'placeholder'=>'Luminaria:']) !!}
	
	<select class ="form-control floating-label" name="luminaria_id">
	@foreach($luminarias as $luminaria)
		
			<option value="{{ $luminaria->id }} ">{{ $luminaria->identificacion }}</option>
			
		
	@endforeach
	</select>
	</div>


</div>