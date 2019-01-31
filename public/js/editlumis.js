$("#piso_id").change(function(event) {
    event.preventDefault();
    var e = event.target.value;
    console.log(e);
    var piso = document.getElementById("piso_id").value;
    var route = window.location.href + '/sectores/' + event.target.value;
    $.get(route, function(response, state) {
        console.log(route);
        console.log(response);
        $("#sector_id").empty();
        for (i = 0; i < response.length; i++) {
            $("#sector_id").append("<option value='" + response[i].id + "'> " + response[i].nombre + "</option>");
        };
    });
});