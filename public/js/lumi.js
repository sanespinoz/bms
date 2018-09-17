$("#pisol_id").change(function(event){
   event.preventDefault();
   var route = window.location.href+'/sectores/'+event.target.value;

$.get(route,function(response,state){
 // console.log(route);
console.log(response);
  $("#sec").empty();
  for(i=0; i<response.length; i++){
    $("#sec").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
  };
  });
});
