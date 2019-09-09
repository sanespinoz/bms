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
    <li class="breadcrumb-item"><a href="{{ url('edificio') }}">Edificio {{ $nombre }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registrar Luminaria</li>
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
      <h2>Registrar Luminaria</h2>
      <br>
    </div>
    <div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
      {!! Form::open(['route'=>'luminaria.store', 'autocomplete'=>'off']) !!}
      {!! csrf_field() !!}
      <br>
      @include('luminaria.partials.form')
      <br>

      {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
      {!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}

      {!! Form::close() !!}
      <script>
        $(document).ready(function(){
          $('#nombre').keyup(function(){ 
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#nombreList').fadeIn();  
               $('#nombreList').html(data);
             }
           });
           }
         });
          $(document).on('click', 'li', function(){  
           $('#nombre').val($(this).text());
           $('#nombreList').fadeOut();  
           var query = $('#nombre').val();
           var _token = $('input[name="_token"]').val();
           $.ajax({
            url:"{{ route('autocomplete.tipo') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#tipo').val(data);
            }
          }); 
           $.ajax({
            url:"{{ route('autocomplete.descripcion') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#descripcion').val(data);
            }
          });   
           $.ajax({
            url:"{{ route('autocomplete.dimensiones') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#dimensiones').val(data);
            }
          });  
           $.ajax({
            url:"{{ route('autocomplete.voltaje_nominal') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#voltaje_nominal').val(data);
            }
          }); 
           $.ajax({
            url:"{{ route('autocomplete.potencia_nominal') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#potencia_nominal').val(data);
            }
          }); 
           $.ajax({
            url:"{{ route('autocomplete.corriente_nominal') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#corriente_nominal').val(data);
            }
          }); 
           $.ajax({
            url:"{{ route('autocomplete.vida_util') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#vida_util').val(data);
            }
          }); 
           $.ajax({
            url:"{{ route('autocomplete.temperatura') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#temperatura').val(data);
            }
          }); 
         });  
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
    </div>
  </div>
</body>
</html>

@endsection
