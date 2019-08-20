@extends('layouts.admin')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item"><a href="{{ url('grupo') }}">Grupos registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición del grupo de luminarias</li>
  </ol>
</nav>

@section('content')
@include('alerts.request')
<html>
<head>
</head>
<body>
  <div align="left" class="container">
    <div class="container-fluid">
      <br>
      <h2>
        Editar Grupo de Luminarias
      </h2>
    </div>
    <br>
    <div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
      
      {!!Form::model($grupo,['route'=> ['grupo.update',$grupo->id],'method'=>'PUT'])!!}
      {!! csrf_field() !!}
      <br>
      @include('grupo.partials.fields')

      <br>

      {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
      {!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}

      {!! Form::close() !!}
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


