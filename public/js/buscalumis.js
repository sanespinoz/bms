$("#grupo_id").change(function(event) {
    event.preventDefault();
    var piso = document.getElementById("piso_id").value;
    var sector = document.getElementById("sector_id").value;
    var route = window.location.href + "/" + piso + "/" + sector + "/" + event.target.value;
    console.log(piso, sector, route);
    $.get(route, function(response, state) {
        console.log(response);
        $("#respuesta").html(response);
    });
});