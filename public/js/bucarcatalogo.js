$("#nombre").keyup(function(){ 
        var query = $(this).val();
        if(query != "")
        {
         var _token = $("input[name='_token']").val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $("#nombreList").fadeIn();  
           $("#nombreList").html(data);
          }
         });
        }
    });
 
