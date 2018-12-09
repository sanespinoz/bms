$("#sector_id").change(function(event) {
    event.preventDefault();
    var x = document.getElementById("piso_id").value;
    var route = window.location.href + '/grupos/' + x + '/' + event.target.value;
    $.get(route, function(response, state) {
        console.log(response);
        for (i = 0; i < response.length; i++) {
            $("#grupo_id").append("<option value='" + response[i].id + "'> " + response[i].nombre + "</option>");
        };
    });
});