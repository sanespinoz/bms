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
    {!! Form::open(['route'=>'sector.index', 'method'=>'GET','role'=>'search']) !!}
    {!! csrf_field() !!}
    <div class="form-inline">
        <select class="form-control floating-label" name="piso">
            @foreach($pisos as $piso)
            <option value="{{ $piso->id }}">
                {{ $piso->nombre }}
            </option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">
            <span aria-hidden="true" class="glyphicon glyphicon-search">
            </span>
        </button>
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
                        Acciones
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