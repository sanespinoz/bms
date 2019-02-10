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
    Grupos Registrados
</h1>
{{--https://bootsnipp.com/snippets/featured/advanced-dropdown-search--}}
{{--AGREGUE EN EL ADMIN UN BUSCADOR.CSS --}}
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" id="adv-search">
                <input class="form-control" placeholder="Buscar por fragmentos" type="text"/>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button aria-expanded="false" class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                <span class="caret">
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                {!! Form::open(['route'=>'grupo.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="filter">
                                        Filtrar por
                                    </label>
                                    <select name="piso">
                                        @foreach($pisos as $piso){
                                        <option value="{{ $piso->id }}">
                                            {{ $piso->nombre }}
                                        </option>
                                        } 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {!! Form::text('sector',null, ['class'=>'form-control','placeholder'=>'Buscar por Sector','aria-describedby'=>'search']) !!}
                                </div>
                                <button class="btn btn-primary" type="submit">
                                    <span aria-hidden="true" class="glyphicon glyphicon-search">
                                    </span>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button">
                            <span aria-hidden="true" class="glyphicon glyphicon-search">
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
    <!-- contenido principal -->
    <section class="resultados" id="resultados">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Cantidad de Luminarias
                    </th>
                    <th>
                        Energía Consumida
                    </th>
                    <th>
                        Piso
                    </th>
                    <th>
                        Sector
                    </th>
                    <th>
                        Hs Activo
                    </th>
                    <th>
                        Activaciones
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>
                        {{ $grupo->nombre }}
                    </td>
                    <td>
                        {{ $grupo->descripcion }}
                    </td>
                    <td>
                        {{ $grupo->cant_luminarias }}
                    </td>
                    <td>
                        {{ $grupo->energia_consumida }}
                    </td>
                    <td>
                        {{ $grupo->piso->nombre }}
                    </td>
                    <td>
                        {{ $grupo->sector }}
                    </td>
                    <td>
                        {{ $grupo->cant_hs_activo }}
                    </td>
                    <td>
                        {{ $grupo->cant_activaciones }}
                    </td>
                    <td>
                        {!!link_to_route('grupo.edit', $title = 'Editar', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-primary'])!!}
                        {!!link_to_route('grupo.show', $title = 'Ver', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-success'])!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $grupos->render() !!}
    </section>
    @endsection
</br>