$('#create_pdf').click(function(event) {
    event.preventDefault();
    var graf = document.getElementById("#hidden_html").val($('#testing').html());
    var route = window.location.href + '/crear_reporte_ener/' + graf;
    console.log(route);
    var graf = document.getElementById("#hidden_html").val($('#testing').html());
    console.log(graf, 'huuu');
    $.get(route, function(response, state) {
        console.log(route);
        console.log(response);
    });
});