@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"> Luminaria: {{ $p->identificacion }}</div>
				<div class="panel-body">
					
					<p>Grupo: {{ $p->grupo->nombre }}</p> 
					<p>Ubicación: {{ $p->ubicacion }}</p>
					<p>Marca: {{ $p->marca }}</p>
					<p>Tipo: {{ $p->tipo }}</p>
					<p>Denominación: {{ $p->denominacion }}</p>
					<p>Consumo: {{ $p->consumo }}</p>
					<p>Tiempo de Uso: {{ $p->tiempo_uso }}</p>
					<p>Cantidad de Lámparas: {{ $p->cant_lamparas }}</p>
					
					
					
		
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection





