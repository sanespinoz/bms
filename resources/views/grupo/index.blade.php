@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Grupos Registrados</h1>

		<table class="table table-bordered table-striped">
			
			<head>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Sector</th>
					<th>Cantidad de Luminarias</th>
					<th>Energía Consumida</th>
					<th>Operaciones</th>
				</tr>
			</head>
			<tbody>
				@foreach($grupos as $grupo)
					<tr>
						<td>{{ $grupo->nombre }}</td>
						<td>{{ $grupo->descripcion }}</td>
						<td>{{ $grupo->sector->nombre}}</td>
						<td>{{ $grupo->cant_luminarias}}</td>
						<td>{{ $grupo->energia_consumida}}</td>
						<td>
					{!!link_to_route('grupo.edit', $title = 'Editar', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!link_to_route('grupo.show', $title = 'Ver', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-success'])!!}
					
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $grupos->render() !!}		

@endsection