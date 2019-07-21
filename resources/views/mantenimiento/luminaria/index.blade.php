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
    <li class="breadcrumb-item active" aria-current="page">Luminarias</li>
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
    Luminarias Registradas
</h2>
<br>
</div>
<br>
<div class="container-fluid col-md-8">
    <div class="input-group" role="menu">
        {!! Form::open(['route'=>'luminaria.index', 'method'=>'GET','class'=>'navbar-form pull-center form-group','role'=>'search']) !!}
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
                <select class="form-control" name="grupo" id="grupo_id">
                <option selected="selected" value="">Selecciona Grupo </option>
            </select>
                <button class="form-control btn btn-primary" type="submit">
                 Buscar
                </button>
                </div>
                {!! Form::close() !!}                
    </div>
<br>
<section class="resultados" id="resultados">
 @if(!$luminarias->isEmpty())

 <div align="left" class="container">
 <p><strong>Cantidad de luminarias: {{ $luminarias->total() }}</strong></p>
 </div>
 <br>
           
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    N° de Serie
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Tipo
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

                @if($luminaria->estado($luminaria->id)->estado == 0)
                  <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-exclamation-circle" style="color:gray">
                            </i>
                        </div>
                    </a>
                @elseif($luminaria->estado($luminaria->id)->estado == 1)
                  <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-check-circle">
                            </i>
                        </div>
                    </a>
                @elseif($luminaria->estado($luminaria->id)->estado == 2)
                   <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i  class="fas fa-times-circle">
                            </i>
                        </div>
                    </a>
                @else
                    <a href="{{ route('estadoluminaria.show', $luminaria->id) }}">
                        <div class="text-center">
                            <i class="fas fa-exclamation-circle" style="color:#E9610F">
                            </i>
                        </div>
                    </a>
                @endif
                </td>
                <td>
                    {!!link_to_route('luminaria.edit', $title = 'Editar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-primary'])!!}

                   {{-- {!!link_to_route('luminaria.eliminar', $title = 'Eliminar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-danger'])!!} --}} 
                </td>
            </tr>
@endforeach
        </tbody> 
    </table>  

     @else <h4><strong>No se registran luminarias</strong></h4>
         @endif
    {!! $luminarias->render() !!}
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
$("#sector_id").change(function(event) {
        var sect = $('#sector_id').val();
        var _token = $('input[name="_token"]').val();
        var pis = document.getElementById("piso_id").value;
 $.ajax({
          url:"{{ route('autocomplete.grupos') }}",
          method:"POST",
          data:{sect:sect, pis:pis, _token:_token},
          success:function(data){

      console.log(data);     
        $("#grupo_id").empty();
        for (i = 0; i < data.length; i++) {
            $("#grupo_id").append("<option value='" + data[i].id + "'> " + data[i].nombre + "</option>");
        };
       }
      }); 
});
});
</script>
  </body>
</html>
@endsection
