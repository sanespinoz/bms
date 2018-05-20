$("#piso").click(function(){
   var dato = $("#piso").val();
    var route = "http://localhost:8082/bms/public/grupo/sec";

    $.ajax({
      url:route,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type:'PACHT',
      dataType: 'json',
      data:{piso: dato}

    });
});
/*
$(document).on('change', '#piso', function (event) {
event.preventDefault();
             var dato = $("#piso").val();
             var form = $(this).parents('form');
             var url = form.attr('action');
             var urlf = "http://localhost:8082/bms/public/sectores/";
             console.log(form);
             console.log(urlf);
             console.log(url);

            // empty the select with previous sectores if we have.
            console.log(dato);


            $.get(urlf +event.target.value, function(res, sta) {
                    $('#sector').empty();
                    res.forEach(element => {
                        $("#sector").append('<option value=${element.id}> ${element.nombre} </option>');
                    });
                });


            });







            */



            jQuery(document).ready(function($){
              $("#piso").change(function(event){
                 event.preventDefault();
                 var route = window.location.href;
                $.get(route+'/sectores/'+event.target.value+"",function(response,piso){

                  for(i=0; i<response.length; i++){
                    $("#sector").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                  }
                });

              });
             });


             ----------------------------
             $("#piso_id").change(function(event){
                  event.preventDefault();
                  var route = window.location.href;
                 $.get(route+'/sectores/'+event.target.value+"",function(response,state){
                   console.log(route);
                   console.log(response);
                   $("#sector_id").empty();
                   for(i=0; i<response.length; i++){
                     $("#sector_id").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
                   });
                 });
               });

               -----------$.ajax({
                 url: route,
                 type: 'GET'


               });
