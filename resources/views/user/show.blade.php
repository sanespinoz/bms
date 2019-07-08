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
<div class="container-fluid">
<br>
<h2>Datos del usuario {{$user->name}}</h2>
<br>
</div>

<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
    <div class="form-group">
        <p><strong>Apellido:</strong> {{$user->apellido}}</p>
        <p><strong>Nombre:</strong> {{$user->nombre}}</p> 
        <p><strong>Correo electrónico:</strong> {{$user->email}}</p>
        <p><strong>Rol:</strong> {{$user->rol->rol}}</p>
       <p><strong>Fecha el último acceso:</strong> {{ auth()->user()->last_login_at }}</p>
    </div>              
<br>
<br>
        {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}

</div>
</div>
</body>
</html>
@endsection
