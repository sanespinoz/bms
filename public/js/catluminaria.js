$(document).on("click", "li", function(){  
 $("#nombre").val($(this).text());
      $("#nombreList").fadeOut();  
      var query = $("#nombre").val();
      var _token = $("input[name='_token']").val();
       $.ajax({
          url:"{{ route('autocomplete.tipo') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#tipo").val(data);
          }
         });   
 $.ajax({
          url:"{{ route('autocomplete.descripcion') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#descripcion").val(data);
          }
         });   
$.ajax({
          url:"{{ route('autocomplete.dimensiones') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#dimensiones").val(data);
          }
         });  
$.ajax({
          url:"{{ route('autocomplete.voltaje_nominal') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#voltaje_nominal").val(data);
          }
         }); 
 $.ajax({
          url:"{{ route('autocomplete.potencia_nominal') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#potencia_nominal").val(data);
          }
         }); 
$.ajax({
          url:"{{ route('autocomplete.corriente_nominal') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#corriente_nominal").val(data);
          }
         }); 
 $.ajax({
          url:"{{ route('autocomplete.vida_util') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#vida_util").val(data);
          }
         }); 
 $.ajax({
          url:"{{ route('autocomplete.temperatura') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
      console.log(data);
          $("#temperatura").val(data);

       }
         }); 
}); 