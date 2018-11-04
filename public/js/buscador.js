function buscargrupo() {
    console.log('estoy en buscargrupo');
    var piso = $("#select_filtro_piso").val();
    var sector = $("#sector_buscado").val();
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