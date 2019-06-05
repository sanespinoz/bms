@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('user') }}">Usuarios registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Información del usuario</li>
  </ol>
</nav>
@section('content')
<html>
    <head>
    </head>
    <body>
 <div align="left" class="container">    

<h2>Datos del usuario {{$user->nombre}}</h2>
<br>
 <div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
                        Datos del usuario {{$user->name}}
                    </div>
            <div class="panel-body">
                        <p>Correo electrónico: {{$user->email}}</p>
                        <p> Rol: {{$user->rol->rol}}</p>
                        <p>Fecha y hora del último acceso: {{$user->last_login_at}}</p>
                    </div>
    </div>
   </div>
</div>
{!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

</div>
</body>
</html>
@endsection
