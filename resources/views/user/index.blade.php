@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}

</div>
@endif

@section('content')

		<h1>Grupos Registrados</h1>

		<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Rol</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->rol->rol}}</td>

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
