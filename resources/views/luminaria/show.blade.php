@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"> Luminaria: {{ $p->identificacion }}</div>
				<div class="panel-body">	
					<p>Piso: {{ $p->piso_id }}</p> 
					<p>Sector: {{ $p->sector_id }}</p>
					<p>Grupo: {{ $p->grupo_id }}</p>
					<p>Código: {{ $p->codigo }}</p>
					<p>Nombre: {{ $p->nombre }}</p>
					<p>Tipo: {{ $p->tipo }}</p>
					<p>Descripción: {{ $p->descripcion }}</p>
					<p>Dimensiones: {{ $p->dimensiones }}</p>
					<p>Voltaje Nominal: {{ $p->voltaje_nominal }}</p>
					<p>Potencia Nominal: {{ $p->potencia_nominal }}</p>
					<p>Corriente Nominal: {{ $p->corriente_nominal }}</p>
					<p>Fecha de Instalación: {{ $p->fecha_alta }}</p>
					<p>Fecha de Desinstalación: {{ $p->fecha_baja }}</p>
					<p>Vida Útil: {{ $p->vida_util }}</p>
					<p>Estado Actual: {{ $p->estado }}</p>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection





