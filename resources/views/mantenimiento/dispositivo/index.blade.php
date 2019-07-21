@extends('layouts.mantenimiento')
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

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ $message }}</strong>

</div>

@endif
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="gestion">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dispositivos</li>
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
<h2>
    Dispositivos Registrados
</h2>
<br>
</div>

<br>
<div class="container-fluid col-md-8">
    <div class="input-group" role="menu">
        {!! Form::open(['route'=>'dispositivo.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
        {!! csrf_field() !!}
        <div class="form-group">
            <select class="form-control" name="piso" id="piso_id">
            <option selected="selected" value=""> Selecciona Piso
                    </option>
            @foreach($pisos as $piso){
                <option value="{{ $piso->id }}">{{ $piso->nombre }} </option>
                                        } 
            @endforeach
            </select>
       
                {!! Form::select('sector',['placeholder'=>'Selecciona Sector'],null,['id'=>'sector_id', 'class'=> 'form-control']) !!}

                <button class="form-control btn btn-primary" type="submit">
                 Buscar
                </button>
                </div>
                {!! Form::close() !!}                
    </div>
<br>
    <!-- contenido principal -->
<section class="resultados" id="resultados">
 @if(!$dispositivos->isEmpty())

<div align="left" class="container">
 <p><strong>Cantidad de dispositivos: {{ $dispositivos->total() }}</strong></p>
 </div>
 <br>
 
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    Código
                </th>
                <th>
                    Tipo
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($dispositivos as $dispositivo)
            <tr>
                <td>
                     <a href="{{ route('dispositivo.show', $dispositivo->id) }}">
                        {{$dispositivo->codigo}}
                    </a>
                </td>
                <td>
                    {{ $dispositivo->tipo }}
                </td>
                <td>
                    {{ $dispositivo->nombre }}
                </td>
                <td>
                    @if ($dispositivo->estado == 'a')
                   <div class="text-center">
                            <i class="fas fa-check-circle">
                            </i>
                        </div>
                    @elseif ($dispositivo->estado == 'f' )
                   <div class="text-center">
                            <i  class="fas fa-times-circle">
                            </i>
                        </div>
                    @elseif ($dispositivo->estado == 'm' )
                    <div class="text-center">
                            <i class="fas fa-exclamation-circle" style="color:#E9610F">
                            </i>
                        </div>
                    @else
                  <div class="text-center">
                            <i class="fas fa-exclamation-circle" style="color:gray">
                            </i>
                        </div>
                    @endif
                </td>
                <td>
                    {!!link_to_route('dispositivo.edit', $title = 'Editar', $parameters = $dispositivo->id, $attributes = ['class'=>'btn btn-primary'])!!}
                    @if(Auth::user()->rol->rol == 'admin')
                    {!!link_to_route('dispositivo.eliminar', $title = 'Eliminar', $parameters = $dispositivo->id, $attributes = ['class'=>'btn btn-danger'])!!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     @else <h4><strong>No se registran dispositivos</strong></h4>
         @endif 
    {!! $dispositivos->render() !!} 
    </section>
    </div>
</div>
<script>
    $(document).ready(function(){ 
 $("#piso_id").change(function(event) {
      var query = $('#piso_id').val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
          url:"{{ route('autocomplete.sectores') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);     
        $("#sector_id").empty();
        for (i = 0; i < data.length; i++) {
            $("#sector_id").append("<option value='" + data[i].id + "'> " + data[i].nombre + "</option>");
        };
      }
    });
    });
});
</script>
  </body>
</html>
@endsection

