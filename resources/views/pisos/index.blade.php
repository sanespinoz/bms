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
    Pisos Registrados
</h1>
<br>
    <!--Buscador de sectores -->
    {!! Form::open(['route'=>'pisos.index', 'method'=>'GET','role'=>'search']) !!}
    {!! csrf_field() !!}
    <div class="form-inline">
        {!! Form::text('piso',null, ['class'=>'form-control','placeholder'=>'Buscar por Nombre']) !!}
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
                        Acciones
                    </th>
                </tr>
            </head>
            <tbody>
                @foreach($pisos as $piso)
                <tr>
                    <td>
                        {{ $piso->nombre }}
                    </td>
                    <td>
                        {{ $piso->descripcion }}
                    </td>
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
    </hr>
</br>