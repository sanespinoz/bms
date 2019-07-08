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
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registrar un grupo de luminarias</li>
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
<h2>Registrar Grupo</h2>
<br>
</div>
<div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
{!! Form::open(['route'=>'grupo.store']) !!}
{!! csrf_field() !!}
<br>
	@include('grupo.partials.form')
<br>
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}

{!! Form::close() !!}
 
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
</div>
</div>
</body>
</html>

@endsection