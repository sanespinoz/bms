<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>BMS</title>
            <link rel="stylesheet" href="assets/css/materialize.min.css">

   

        {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')!!}
        {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css')!!}

        
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 40px;
            }
        </style>
    </head>
    <body ng-app="bmsApp">

    <div ng-view></div>

        {{ "hola" }}
        <div class="container">
            <div class="content">
                <!--<div class="title">Sistema de Automatización de Iluminación</div>-->


                <canvas id="canvas" width="431" height="228" style="float:left"></canvas>
                <div id="box" style="width:200px;height:50px;float:left"></div>
    

    <script type="text/javascript">
      var img = new Image();
    //img.setAttribute('crossOrigin','anonymous');
    img.src = 'fondor.png';
    
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    img.onload = function() {
      ctx.drawImage(img, 0, 0);
      img.style.display = 'none';

    };
   // if (document.getElementById('canvas')) {
 // document.getElementById('hello').innerHTML = 'Hello World - this was inserted using JavaScript';
//}


var mouse = {
  x: 0,
  y: 0,
  move: function() {
    
//document.getElementById('box').innerHTML = 'Mouse X: '+mouse.x+' <br/> Mouse Y: '+mouse.y;
 
((mouse.x >= 326 && mouse.x <= 335 ) &&  (mouse.y >= 194 && mouse.y <= 210)) ? //cambie la forma del cursor, y que si hace click abra otra ventana
//document.getElementById('box').innerHTML = 'Mouse X: '+mouse.x+' <br/> Mouse Y: '+mouse.y
//window.location = 'http://ultiminioramos.com'
window.open("http://ultiminioramos.com", "nuevo", "width=400, height=400")
/*
    directories - en el caso de que este activada nos mostrara la barra de vínculos.
    height - indicaremos la altura que debe de tener la página.
    location - nos servirá para desactivar la barra de navegación.
    menubar - representa a la barra de menús superior.
    scrollbars - sirve para indicar si aparecerán o no las barras de scroll.
    status - representa a la barra de estado.
    titlebar - representa a la barra del titulo.
*/
//window.open("lampara", "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400")
 
 : document.getElementById('box').innerHTML = null;


}
};

setInterval(mouse.move,35);

document.onmousemove = function (e) {
  var X = (document.all && event.clientX)? event.clientX +
      (document.documentElement.scrollLeft || document.body.scrollLeft) :
      (e.pageX)? e.pageX : null;
  var Y = (document.all && event.clientY)? event.clientY +
      (document.documentElement.scrollTop || document.body.scrollTop) :
  (e.pageY)? e.pageY : null;
  mouse.x = X - 25;
  mouse.y = Y - 25;
};
    </script>



            </div>
        </div>
      
        
<a ui-sref="usuarios">Ir al usuario</a>
    <div ui-view></div>

               <script  src="components/angular.min.js"></script>
               <script  src="components/angular-resource.min.js"></script>
               <script  src="components/angular-route.min.js"></script>
               <script  src="components/angular-ui-router.js">  </script>

              <script src="script/app.js"></script>

            <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
            <script  src="assets/js/jquery-2.2.3.min.js"></script>
            <script  src="assets/js/materialize.min.js"></script>
   
    </body>
</html>
