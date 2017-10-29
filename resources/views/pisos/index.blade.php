@extends('app')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Pisos Registrados</h1>

		<table class="table table-bordered table-striped">
			
			<head>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Operaciones</th>
				</tr>
			</head>
			<tbody>
				@foreach($pisos as $piso)
					<tr>
						<td>{{ $piso->nombre }}</td>
						<td>{{ $piso->descripcion }}</td>
						<td>
					{!!link_to_route('pisos.edit', $title = 'Editar', $parameters = $piso->id, $attributes = ['class'=>'btn btn-primary'])!!}
					{!!link_to_route('pisos.show', $title = 'Ver', $parameters = $piso->id, $attributes = ['class'=>'btn btn-success'])!!}
				</td>
					</tr>

				@endforeach
			</tbody>
		</table>
		
		{!! $pisos->render() !!}		

@endsection