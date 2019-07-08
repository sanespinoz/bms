$("#create_pdf").click(function(event) {
    var reports = document.getElementById("testing").innerHTML;
    var titulo = $("#hidden_html_titulo").val();
    var route = window.location.href + '/create_pdf/' + reports +'/'+ titulo;
    $("#hidden_html").val(reports);

    $.get(route, function(response, state) {
        console.log(response);
    });
});