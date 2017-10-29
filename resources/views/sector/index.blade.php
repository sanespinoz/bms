@extends('app')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Sectores Registrados</h1>

		<table class="table table-bordered table-striped">
			
			<head>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Piso</th>
					<th>Operaciones</th>
				</tr>
			</head>
			<tbody>
				@foreach($sectores as $sector)
					<tr>
						<td>{{ $sector->nombre }}</td>
						<td>{{ $sector->descripcion }}</td>
						<td>{{ $sector->piso->nombre}}</td>
						<td>
					{!!link_to_route('sector.edit', $title = 'Editar', $parameters = $sector->id, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!link_to_route('sector.show', $title = 'Ver', $parameters = $sector->id, $attributes = ['class'=>'btn btn-success'])!!}
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $sectores->render() !!}		

@endsection