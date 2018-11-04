@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
            ×
        </span>
    </button>
    {{Session::get('message')}}
</div>
@endif

@section('content')
<h1>
    Sectores Registrados
</h1>
<br>
    <!--Buscador de sectores -->
    {{--  {!! Form::open(['route'=>'sector.index', 'method'=>'GET','class'=>'navbar-form pull-right']) !!}
    <div class="input-group">
        {!! Form::text('nombre',null, ['class'=>'form-control','placeholder'=>'Buscar por sector','aria-describedby'=>'search']) !!}
        <span class="input-group-addon" id="search">
            <search class="glyphicon glyphicon-search">
            </search>
        </span>
    </div>
    {!! Form::close() !!}
--}}
		{!! Form::open(['route'=>'sector.index', 'method'=>'GET','class'=>'navbar-form pull-center']) !!}
    <div class="input-group">
        {!! Form::text('piso',null, ['class'=>'form-control','placeholder'=>'Buscar por Piso','aria-describedby'=>'search']) !!}
        <span class="input-group-addon" id="search">
            <search class="glyphicon glyphicon-search">
            </search>
        </span>
    </div>
    {!! Form::close() !!}
    <hr>
        <!-- Fin buscador -->
        <table class="table table-bordered table-striped">
            <head>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Piso
                    </th>
                    <th>
                        Operaciones
                    </th>
                </tr>
            </head>
            <tbody>
                @foreach($sectores as $sector)
                <tr>
                    <td>
                        {{ $sector->nombre }}
                    </td>
                    <td>
                        {{ $sector->descripcion }}
                    </td>
                    <td>
                        {{ $sector->piso->nombre}}
                    </td>
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
    </hr>
</br>