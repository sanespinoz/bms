function buscargrupo() {
    console.log('estoy en buscargrupo');
    var piso = document.getElementById("select_filtro_piso").value;
    var sector = document.getElementById("sector_buscado").value;
    console.log(piso, sector);
    if (sector == "") {
        var url = window.location.href + "/buscar_grupos/" + piso + "";
    } else {
        var url = window.location.href + "/buscar_grupos/" + piso + "/" + sector + "";
    }
    console.log(url);
    $.get(url, function(grupos) {
        console.log(grupos);
        $("#resultados").html(grupos);
    })
}