@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Luminarias Registradas</h1>
 //lo agregue cuando hacia los reportes por si fuera necesario no tiene funcionalidad aun
		<nav class="navbar navbar-light bg-light">
			<form class="form-inline">
				<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			</form>
		</nav>

		<table class="table table-bordered table-striped">
		
			<head>
				<tr>
					<th>Identificación</th>
					<th>Código</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Descripción</th>
					<th>Dimensiones</th>
					<th>Voltaje Nominal</th>
					<th>Potencia Nominal</th>
					<th>Corriente Nominal</th>
					<th>Fecha Instalación</th>
					<th>Fecha de Baja</th>
					<th>Vida Útil</th>
					<th>Estado</th>
					<th>Grupo</th>
					<th>Operaciones</th>
				</tr>
			</head>
			<tbody>

				@foreach($luminarias as $luminaria)
					<tr>
						<td><a href="{{ route('luminaria.show', $luminaria->id) }}">{{$luminaria->identificacion}}</a></td>
						<td>{{ $luminaria->codigo }}</td>
						<td>{{ $luminaria->nombre }}</td>
						<td>{{ $luminaria->tipo }}</td>
						<td>{{ $luminaria->descripcion}}</td>
						<td>{{ $luminaria->dimensiones}}</td>
						<td>{{ $luminaria->voltaje_nominal}}</td>
						<td>{{ $luminaria->potencia_nominal}}</td>
						<td>{{ $luminaria->corriente_nominal}}</td>
						<td>{{ $luminaria->fecha_alta}}</td>
						<td>{{ $luminaria->fecha_baja}}</td>
						<td>{{ $luminaria->vida_util}}</td>
						<td>{{ $luminaria->estado}}</td>
						<td>{{ $luminaria->grupo->nombre}}</td>
						<td>
					{!!link_to_route('luminaria.edit', $title = 'Editar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-primary'])!!}
				    {!!link_to_route('luminaria.show', $title = 'Ver', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-success'])!!}
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $luminarias->render() !!}		

@endsection