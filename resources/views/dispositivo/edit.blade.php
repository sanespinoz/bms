@extends('layouts.admin')

<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ url('dispositivo') }}">Dispositivos registrados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición del dispositivo</li>
  </ol>
</nav>

@section('content')
@include('alerts.request')
@include('alerts.errors')
@include('alerts.success')
<html>
<head>
</head>
<body>
<div align="left" class="container">
<div class="container-fluid">
<h2>
    Editar Dispositivo   
</h2>
</div>
<br>
<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
		
		{!!Form::model($dispositivo,['route'=> ['dispositivo.update',$dispositivo->id],'method'=>'PUT'])!!}
			@include('dispositivo.partials.fields')
           <br>
           <br>
           <div class="form-group col-xs-12">
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
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
