$("#sec").change(function(event){
   event.preventDefault();
   var x = document.getElementById("pisol_id").value; 
   var route = window.location.href+'/grupos/'+x+'/'+event.target.value;

$.get(route,function(response,state){

 console.log(response);
  $("#grupol_id").empty();
  for(i=0; i<response.length; i++){
    $("#grupol_id").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
  };
  });

});