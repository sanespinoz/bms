@extends('layouts.mantenimiento')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('gestion') }}">Inicio</a></li>
    <li class="breadcrumb-item">Edificio {{ $nombre }}</li>
    <li class="breadcrumb-item"><a href="{{ url('luminaria') }}">Luminarias instaladas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edición de la luminaria</li>
  </ol>
</nav>
@section('content')
@include('alerts.request')
<html>
<head>
</head>
<body>
  <div align="left" class="container">
    <h2>
      Editar luminaria
    </h2>
    <br>
    <div class="container-fluid  col-sm-6 col-md-6 col-lg-6">
      
      {!!Form::model($luminaria,['route'=> ['luminaria.update',$luminaria->id],'method'=>'PUT',$pisos,$sectdelp, $gruposdelp, $p, $g, $s])!!}
      {!! csrf_field() !!}
      @include('mantenimiento.luminaria.partials.fields')
      <br>
      <br>
      <div class="form-group col-xs-12">
        {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
        {!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
      </div>
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
              console.log(data[0]);
              var o = data[0]
              $('#tipo').val(o.tipo);
              $('#descripcion').val(o.descripcion);
              $('#dimensiones').val(o.dimensiones);
              $('#voltaje_nominal').val(o.voltaje_nominal);
              $('#potencia_nominal').val(o.potencia_nominal);
              $('#corriente_nominal').val(o.corriente_nominal);
              $('#vida_util').val(o.vida_util);
              $('#temperatura').val(o.temperatura);

            }
          }); 
          /* $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#descripcion').val(data);
            }
          });   
           $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#dimensiones').val(data);
            }
          });  
           $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#voltaje_nominal').val(data);
            }
          }); 
           $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#potencia_nominal').val(data);
            }
          }); 
           $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#corriente_nominal').val(data);
            }
          }); 
           $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#vida_util').val(data);
            }
          }); 
           $.ajax({
            url:"",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
              console.log(data);
              $('#temperatura').val(data);
            }
          }); */
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
