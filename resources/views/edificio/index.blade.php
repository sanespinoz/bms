@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Edificios Registrados</h1>

		<table class="table table-bordered table-striped">
			
			<head>
				<tr>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Descripción</th>
					<th>Ciudad</th>
					<th>Provincia</th>
				</tr>
			</head>
			<tbody>
				@foreach($edificios as $edificio)
					<tr>
						<td>{{ $edificio->nombre }}</td>
						<td>{{ $edificio->direccion }}</td>
						<td>{{ $edificio->telefono}}</td>
						<td>{{ $edificio->descripcion}}</td>
						<td>{{ $edificio->ciudad}}</td>
						<td>{{ $edificio->provincia}}</td>
						<td>
					{!!link_to_route('edificio.edit', $title = 'Editar', $parameters = $edificio->id, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!link_to_route('edificio.show', $title = 'Ver', $parameters = $edificio->id, $attributes = ['class'=>'btn btn-success'])!!}
					
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $edificios->render() !!}

@endsection