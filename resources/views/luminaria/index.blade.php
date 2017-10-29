@extends('app')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Luminarias Registradas</h1>

		<table class="table table-bordered table-striped">
			
			<head>
				<tr>
					<th>Identificación</th>
					<th>Ubicación</th>
					<th>Denominación</th>
					<th>Marca</th>
					<th>Tipo</th>
					<th>Cantidad de Lámparas</th>
					<th>Consumo</th>
					<th>Tiempo de Uso</th>
					<th>Grupo</th>
					<th>Operaciones</th>
				</tr>
			</head>
			<tbody>
				@foreach($luminarias as $luminaria)
					<tr>
						<td><a href="{{ route('luminaria.show', $luminaria->id) }}">{{$luminaria->identificacion}}</a></td>
					
						<td>{{ $luminaria->ubicacion }}</td>
						<td>{{ $luminaria->denominacion }}</td>
						<td>{{ $luminaria->marca }}</td>
						<td>{{ $luminaria->tipo }}</td>
						<td>{{ $luminaria->cant_lamparas}}</td>
						<td>{{ $luminaria->consumo}}</td>
						<td>{{ $luminaria->tiempo_uso}}</td>
						<td>{{ $luminaria->grupo->nombre}}</td>
						<td>
					{!!link_to_route('luminaria.edit', $title = 'Editar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-primary'])!!}
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $luminarias->render() !!}		

@endsection