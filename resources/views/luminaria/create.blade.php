@extends('layouts.admin')
@section('content')

@include('alerts.request')
<h1>
    Registrar Luminaria
</h1>
{!! Form::open(['route'=>'luminaria.store']) !!}
{!! csrf_field() !!}

    @include('luminaria.partials.form')
<div class="form-group col-xs-12">
    {!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>
{!! Form::close() !!}
@endsection

@section('scripts')  
   
    {!! Html::script('js/lumi.js') !!}
    {!! Html::script('js/lumigroup.js') !!} 
    {!! Html::script('js/datepick.js') !!}
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
          url:"{{ route('autocomplete.info') }}",
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
          url:"{{ route('autocomplete.volt') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
			console.log(data);
          $('#voltaje_nominal').val(data);
          }
         }); 
 $.ajax({
          url:"{{ route('autocomplete.pot') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
			console.log(data);
          $('#potencia_nominal').val(data);
          }
         }); 
$.ajax({
          url:"{{ route('autocomplete.corr') }}",
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
});
</script>
@endsection
