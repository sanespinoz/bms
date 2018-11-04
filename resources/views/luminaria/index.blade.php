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
//lo agregue cuando hacia los reportes por si fuera necesario no tiene funcionalidad aun
<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
        <input aria-label="Buscar" class="form-control mr-sm-2" placeholder="Buscar" type="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Buscar
            </button>
        </input>
    </form>
</nav>
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
                Operaciones
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
                {{-- --}}
            </td>
            <td>
                {{ $luminaria->vida_util }}
            </td>
            <td>
                {{-- luminaria  llama a la funcion estado en luminaria.php y si esta activa muestra check sino x solo que me lo tiene que traer como una  collect para accederlo o un array hacer un dd dentro de la funcioon estado para ver como lo devuelve --}}
                <div class="text-center">
                    <i class="fas fa-check-circle ">
                    </i>
                </div>
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
