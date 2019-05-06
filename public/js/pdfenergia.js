$("#create_pdf").click(function(event) {
    var graf = document.getElementById("testing").innerHTML;
    var route = window.location.href + '/create_pdf/' + graf;
    $("#hidden_html").val(graf);
    console.log(route);
    console.log('huuu');
    $.get(route, function(response, state) {
        console.log(response);
    });
});