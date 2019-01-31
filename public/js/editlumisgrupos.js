$("#sector_id").change(function(event) {
    event.preventDefault();
    var x = document.getElementById("piso_id").value;
    var route = window.location.href + '/grupos/' + x + '/' + event.target.value;
    console.log(route);
    $.get(route, function(response, state) {
        console.log(response);
        $("#sector_id").empty();
        for (i = 0; i < response.length; i++) {
            $("#grupo_id").append("<option value='" + response[i].id + "'> " + response[i].nombre + "</option>");
        };
    });
});