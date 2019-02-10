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
    Dispositivos Registrados
</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" id="adv-search">
                <input class="form-control" placeholder="Search for snippets" type="text"/>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button aria-expanded="false" class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                <span class="caret">
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                {!! Form::open(['route'=>'dispositivo.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
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
    <table class="table table-bordered table-striped">
        <head>
            <tr>
                <th>
                    Código
                </th>
                <th>
                    Marca
                </th>
                <th>
                    Tipo
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Fecha de Alta
                </th>
                <th>
                    Piso
                </th>
                <th>
                    Sector
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </head>
        <tbody>
            @foreach($dispositivos as $dispositivo)
            <tr>
                <td>
                    {{ $dispositivo->codigo }}
                </td>
                <td>
                    {{ $dispositivo->marca }}
                </td>
                <td>
                    {{ $dispositivo->tipo }}
                </td>
                <td>
                    {{ $dispositivo->nombre }}
                </td>
                <td>
                    {{ $dispositivo->descripcion }}
                </td>
                <td>
                    @if ($dispositivo->estado == 'a')
                    <div class="text-center">
                        <i class="fas fa-check-circle ">
                        </i>
                    </div>
                    @elseif ($dispositivo->estado == 'f' )
                    <div class="text-center">
                        <i class="fas fa-exclamation-circle" style="color:#FF8C00">
                        </i>
                    </div>
                    @else
                    <div class="text-center">
                        <i class="fas fa-times-circle" style="color:#FF0000">
                        </i>
                    </div>
                    @endif
                </td>
                <td>
                    {{ $dispositivo->fecha_alta}}
                </td>
                <td>
                    {{ $dispositivo->piso->nombre}}
                </td>
                <td>
                    {{ $dispositivo->sector}}
                </td>
                <td>
                    {!!link_to_route('dispositivo.edit', $title = 'Editar', $parameters = $dispositivo->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    {!!link_to_route('dispositivo.show', $title = 'Ver', $parameters = $dispositivo->id, $attributes = ['class'=>'btn btn-success'])!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $dispositivos->render() !!}     

@endsection
</br>