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
    Usuarios Registrados
</h1>
{{-- buscador --}}
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
                                {!! Form::open(['route'=>'user.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
                                <div class="form-group">
                                    <label for="filter">
                                        Filtrar por
                                    </label>
                                    <select name="rol">
                                        @foreach($roles as $rol){
                                        <option value="{{ $rol->id }}">
                                            {{ $rol->rol }}
                                        </option>
                                        } 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Buscar por Nombre','aria-describedby'=>'search']) !!}
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
    {{-- buscador --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>
                    Nombre
                </td>
                <td>
                    Correo Electrónico
                </td>
                <td>
                    Rol
                </td>
                <td>
                    Acciones
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->rol->rol}}
                </td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    {!!link_to_route('user.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
                        {!!link_to_route('user.show', $title = 'Ver', $parameters = $user->id, $attributes = ['class'=>'btn btn-success'])!!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}

@endsection
</br>