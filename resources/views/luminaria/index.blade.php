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
    Luminarias Registradas
</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group" id="adv-search">
                <input class="form-control" placeholder="Buscar " type="text"/>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button aria-expanded="false" class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                                <span class="caret">
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                {!! Form::open(['route'=>'luminaria.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
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
                                <div class="form-group">
                                    {!! Form::text('grupo',null, ['class'=>'form-control','placeholder'=>'Buscar por Grupo','aria-describedby'=>'search']) !!}
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
            {{-- Este listado quizas deba mostrarme algo mas util o bien dejo solo los datos especificos de la tabla luminaria y cuando view traigo los datos del piso sector y grupo y tambien lo de la tabla de estado..el valor de regulacion, para cambiar el estado link en el i y me manda a edit estado --}}
            <tr>
                <th>
                    Código
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Tipo
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Dimensiones
                </th>
                <th>
                    Voltaje Nominal
                </th>
                <th>
                    Potencia Nominal
                </th>
                <th>
                    Corriente Nominal
                </th>
                <th>
                    Fecha Instalación
                </th>
                <th>
                    Fecha de Baja
                </th>
                <th>
                    Vida Útil
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Temperatura
                </th>
                <th>
                    Grupo
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </head>
        <tbody>
            @foreach($luminarias as $luminaria)
            <tr>
                <td>
                    <a href="{{ route('luminaria.show', $luminaria->id) }}">
                        {{$luminaria->codigo}}
                    </a>
                </td>
                <td>
                    {{ $luminaria->nombre }}
                </td>
                <td>
                    {{ $luminaria->tipo }}
                </td>
                <td>
                    {{ $luminaria->descripcion }}
                </td>
                <td>
                    {{ $luminaria->dimensiones }}
                </td>
                <td>
                    {{ $luminaria->voltaje_nominal }}
                </td>
                <td>
                    {{ $luminaria->potencia_nominal }}
                </td>
                <td>
                    {{ $luminaria->corriente_nominal }}
                </td>
                <td>
                    {{ $luminaria->fecha_alta }}
                </td>
                <td>
                    @if ($luminaria->fecha_baja) {{ $luminaria->fecha_baja }}
                    @endif
                </td>
                <td>
                    {{ $luminaria->vida_util }}
                </td>
                <td>
                    @if ($luminaria->estado($luminaria->id))

                    @if ($luminaria->estado($luminaria->id)->estado  == 1)
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-check-circle ">
                            </i>
                        </div>
                    </a>
                    @elseif ($luminaria->estado($luminaria->id)->estado  == 2 )
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-exclamation-circle" style="color:#FF8C00">
                            </i>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-times-circle" style="color:#FF0000">
                            </i>
                        </div>
                    </a>
                    @endif
                    @endif
                    {{-- luminaria  llama a la funcion estado en luminaria.php y si esta activa muestra check sino x solo que me lo tiene que traer como una  collect para accederlo o un array hacer un dd dentro de la funcioon estado para ver como lo devuelve --}}
                </td>
                <td>
                    {{ $luminaria->temperatura }}
                </td>
                <td>
                    {{ $luminaria->grupo->nombre }}
                </td>
                <td>
                    {!!link_to_route('luminaria.edit', $title = 'Editar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-primary'])!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $luminarias->render() !!}       

@endsection
</br>