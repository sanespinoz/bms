@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"> Lámpara: {{ $p->tipo}}</div>
				<div class="panel-body">
					
					<p>Luminaria: {{ $p->luminaria->luminaria_id }}</p>
					<p>Marca: {{ $p->marca }}</p>
					<p>Potencia: {{ $p->potencia }}</p>
					<p>Factor Potencia: {{ $p->factor_potencia }}</p>
					<p>Voltaje: {{ $p->voltaje }}</p>
					<p>Tipo: {{ $p->tipo }}</p>
					<p>Fecha de Instalación: {{ $p->fecha_instalacion }}</p>
					<p>Vida: {{ $p->vida }}</p>
					<p>Horas Activa: {{ $p->horas_activas }}</p>
					<p>Horas Restantes de Uso: {{ $p->tiempo_restante }}</p>

					
					
					
		
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection





