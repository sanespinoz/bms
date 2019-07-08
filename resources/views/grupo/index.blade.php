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
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="gestion">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Grupos</li>
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
<h2>Grupos Registrados</h2>
<br>
</div>

<br>
<div class="container-fluid col-sm-6 col-md-6 col-lg-8">
    <div class="input-group" role="menu">
                {!! Form::open(['route'=>'grupo.index', 'method'=>'GET','class'=>'navbar-form pull-left form-group','role'=>'search']) !!}
                 {!! csrf_field() !!}
                    <div class="form-group">
                        <select  class="form-control" name="piso" id="piso_id">
                        <option selected="selected" value=""> Seleccione el Piso
                    </option>
                                        @foreach($pisos as $piso){
                                        <option value="{{ $piso->id }}">
                                            {{ $piso->nombre }}
                                        </option>
                                        } 
                                        @endforeach
                        </select>

                {!! Form::select('sector',['placeholder'=>'Selecciona Sector'],null,['class'=>'form-control','id'=>'sector_id']) !!}
            
                <button class="form-control btn btn-primary" type="submit">
                 Buscar
                </button>
                </div>
                {!! Form::close() !!}                
    </div>
<br>
    <!-- contenido principal -->
    <section class="resultados" id="resultados">

    <div align="left" class="container">
 <p><strong>Cantidad de grupos: {{ $grupos->total() }}</strong></p>
 </div>
 <br>
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
                        Piso
                    </th>
                    <th>
                        Sector
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos as $grupo)
                <tr>
                    <td>
                    <a href="{{ route('grupo.show', $grupo->id) }}">
                        {{$grupo->nombre}}
                    </a>
                    </td>
                    <td>
                        {{ $grupo->descripcion }}
                    </td>

                    <td>
                        {{ $grupo->piso->nombre }}
                    </td>
                    <td>
                         {{ $grupo->sector->nombre}}
                    </td>
                    <td>
                        {!!link_to_route('grupo.edit', $title = 'Editar', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-primary'])!!}
                        {!!link_to_route('grupo.eliminar', $title = 'Eliminar', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-danger'])!!}
                     
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $grupos->render() !!}
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
            $("#sector_id").append("<option value='" + data[i].nombre + "'> " + data[i].nombre + "</option>");
        };
      }
    });
    });
});
</script>
</body>
</html>
    @endsection
