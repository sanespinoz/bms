@extends('app')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Lámparas Registradas</h1>

		<table class="table table-bordered table-striped">
			
			<head>
				<tr>
					<th>Marca</th>
					<th>Tipo</th>
					<th>Voltaje</th>
					<th>Factor de Potencia</th>
					<th>Fecha de Instalación</th>
					<th>Potencia</th>
					<th>Vida Util</th>
					<th>Horas Activa</th>
					<th>Tiempo Restante</th>
					<th>Estado</th>
					<th>luminaria</th>
					<th>Operaciones</th>
				</tr>
			</head>
			<tbody>
				@foreach($lamparas as $lampara)
					<tr>
						<td>{{ $lampara->marca }}</td>
						<td>{{ $lampara->tipo }}</td>
						<td>{{ $lampara->voltaje }}</td>
						<td>{{ $lampara->factor_potencia }}</td>
						<td>{{ $lampara->fecha_instalacion }}</td>
						<td>{{ $lampara->potencia}}</td>
						<td>{{ $lampara->vida}}</td>
						<td>{{ $lampara->horas_activas}}</td>
						<td>{{ $lampara->tiempo_restante}}</td>
						<td>{{ $lampara->estado}}</td>
						<td>{{ $lampara->luminaria->identificacion}}</td>
						<td>
					{!!link_to_route('lampara.edit', $title = 'Editar', $parameters = $lampara->id, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $lamparas->render() !!}		

@endsection