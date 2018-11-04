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
{!! Form::open(['route'=>'grupo.index', 'method'=>'GET','class'=>'navbar-form pull-center']) !!}
<div class="box-header">
    <h4 class="box-title">
        Buscar Grupos
    </h4>
    <div class="input-group input-group-sm">
        <input class="form-control" id="sector_buscado" type="text">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" onclick="buscargrupo();" type="button">
                    Buscar
                </button>
            </span>
        </input>
    </div>
    <div>
        <select id="select_filtro_piso" onchange="buscargrupo();">
            @php
            @if(isset($pisosel))
            { 
             $listadopiso=$pisosel->nombre; 
             $optsel= @endphp
            <option value="{{ $pisosel->id}}">
                {{$pisosel->nombre  }}
            </option>
            @php;
        }
        @else
        {  
            $listadopiso="General";
            $optsel="";
         }
         @endif
            <option value="0">
                General
            </option>
            @php 
        @foreach($pisos as $piso){   
        @endphp
            <option value="{{ $piso->id }}">
                {{ $piso->nombre }}
            </option>
            @php } 
        @endforeach
         @endphp
        </select>
    </div>
</div>
{{--
<div class="input-group">
    {!! Form::text('dato', null, ['class'=>'form-control floating-label','placeholder'=>'Nombre:','required']) !!}
    <span class="input-group-addon" id="search">
        <search class="glyphicon glyphicon-search">
        </search>
    </span>
</div>
<div class="form-group">
    <select class="form-control floating-label" name="piso">
        @foreach($pisos as $piso)
        <option value="{{ $piso->id }}">
            {{ $piso->nombre }}
        </option>
        @endforeach
    </select>
</div>
--}}



            {!! Form::close() !!}
<hr>
    <!-- contenido principal -->
    <section class="content" id="resultados">
    </section>
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
                    Operaciones
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
                    {{ $grupo->cant_luminarias}}
                </td>
                <td>
                    {{ $grupo->energia_consumida}}
                </td>
                <td>
                    {{ $grupo->piso->nombre}}
                </td>
                <td>
                    {{ $grupo->sector_id}}
                </td>
                <td>
                    {{ $grupo->cant_hs_activo}}
                </td>
                <td>
                    {{ $grupo->cant_activaciones}}
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

@endsection
</hr>