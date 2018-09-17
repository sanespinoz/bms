<!DOCTYPE html>

<html lang="en" ng-app="dreamsApp">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SAI</title>


	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link href="css/grayscale.css" rel="stylesheet">
	<link href="css/monitoreo.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="js/metisMenu.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">


	<script type="text/javascript" src="js/jquery.min.js"></script>

</head>

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    $(function(){

        var municipios_data = {
            'psupIzq1': 'Piso superior izquierdo lum 1',
            'psupIzq2': 'Piso superior izquierdo lum 2',
            'psupIzq3': 'Piso superior izquierdo lum 3',
        };


        var $luminaria = $('#luminariatxt');

        $.ajax({
            url: 'img/lumicopia1.svg',
            type: 'GET',
            dataType: 'xml',
            success: function(xml) {
                var rjs = Raphael('lienzo',1400, 700);

                $(xml).find('svg > g ').each(function() {
                    var pid = $(this).attr('id');
                    //var rectan = $(this).attr('rect');
                    console.log(pid);

                });
                //$('#loadingicon').hide();
            }
        });
    });

    $(function(){
        <?php
       if (Auth::guest()){

      ?>
       $("ul li:first").show();


       <?php }
       else{
           ?>

            $("ul li:first").hide();
            $("section#login").hide();
            <?php }
            ?>

        });

</script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" ng-controller="AppCtrl">

<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">
				<i class="fa fa-play-circle"></i>  Inicio
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			<ul class="nav navbar-nav">
				<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
				@if (Auth::guest())

					<li>
						<a class="page-scroll" href="#login">Iniciar Sesión</a> <!--tenia un ancla al pie de la pagina #Auth-->
					</li>

					<li><a class="page-scroll" href="#register">Registrarse</a></li>
				@else
					<!--<li class="hidden">
						<a href="#page-top"></a>
					</li>-->
					<li>
						<a class="page-scroll" href="#dreams">Luminarias</a>
					</li>
					<li>
						<a class="page-scroll" href="#monitoreo">Monitoreo</a>
					</li>
					@if (Auth::user()->rol_id !== '3')
					<li>
						<a class="page-scroll" href="gestion">Gestión</a>
					</li>
					@endif
					<li>
						<a href="{!!URL::to('logout')!!}">Salir</a>
					</li>
				@endif

			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>

<!-- Intro Header -->
<header class="intro">
	<div class="intro-body">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1 class="brand-heading">Sistema de gestión y automatización de la iluminación

					</h1>
					<p class="intro-text">Gestión de recursos, monitoreo de dispositivos en tiempo real y visualización de reportes, para edificios de oficinas</p>
					<a href="#dreams" class="btn btn-circle page-scroll">
						<i class="fa fa-angle-double-down animated"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- pisos Section -->
<section id="dreams" class="container content-section text-center">
	<div class="row">
		<div id="municipiotxt">Selecciona una luminaria</div>
		<div class="col-md-8">
			<object type="image/svg+xml" data="img/lumicopia.svg" width="100%" height="100%"></object></div>

	</div>

</section>
<section id="monitoreo">

		<!--<div class="col-md-6 col-md-offset-3"> -->





			<!--	<div class="embed-container"> -->
				 <!--  <iframe width="640" height="360" src="http://192.168.0.111/BMS/login.html" frameborder="0" allowfullscreen></iframe> -->

				<iframe allowfullscreen="true"
	mozallowfullscreen="true" webkitallowfullscreen="true"
	src="http://192.168.0.111/BMS/login.html"
	width="1250px" height="700px" frameborder="0"></iframe>

	<!--	</div>-->

</section>

<!-- Auth Section
-->
<section id="login" class="container-fluid content-section text-center" style="background-color:#ccebff">
	<div class="row">
		<div class="panel-heading">INICIO DE SESIÓN</div>
		<div class="panel-body">
			<form method="POST" action="login">
			{!! csrf_field() !!}
				@if (count($errors) > 0)
					<ul>
						@foreach ($errors->all() as $error)
							<lu>{{ $error }}</lu>
						@endforeach
					</ul>
				@endif
				<div class="form-group">
					<label>Correo Electrónico</label>
					{!! Form::email('email', '', ['class'=> 'form-control']) !!}
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					{!! Form::password('password', ['class'=> 'form-control','id'=>'password']) !!}
				</div>



				<div>
					<input type="checkbox" name="remember"> Recuérdame
				</div>
				<div>
					<a href="password/email"> Restablecer Contraseña</a>
				</div>
				<div>
					<button type="submit" class="btn btn-primary" >Ingresar</button>
				</div>
			</form>
		</div>
	</div>
</section>

<section id="register" class="container-fluid content-section text-center"  style="background-color:#022B59">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

				<div class="panel-heading">REGISTRO DE USUARIO</div>

				<div class="panel-body">
					{!! Form::open(['route' => 'register', 'class' => 'form']) !!}

					<div class="form-group">
						<label>Nombre</label>
						{!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
					</div>
					<div class="form-group">
						<label>Correo Electrónico</label>
						{!! Form::email('email', '', ['class'=> 'form-control']) !!}
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						{!! Form::password('password', ['class'=> 'form-control']) !!}
					</div>

					<div class="form-group">
						<label>Confirmación de Contraseña </label>
						{!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
					</div>

					<div>
						{!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
					</div>
					{!! Form::close() !!}
				</div>
			</div>

	</div>
</section>



<!-- Footer -->
<footer>
	<div class="container text-center">
		<p>Copyright &copy; Proyecto Final de Grado</p>
	</div>
</footer>


<script src="js/bootstrap.min.js"></script>
<!--<script src="../bower_components/velocity/velocity.js"></script>-->
<script src="../bower_components/moment/min/moment-with-locales.js"></script>
<!--<script src="../bower_components/angular/angular.js"></script> -->



<script src="js/metisMenu.min.js"></script>
<!-- Plugin JavaScript
<script src="js/jquery.easing.min.js"></script>

<!-- Custom Theme JavaScript -->
<!--<script src="assets/js/grayscale.js"></script>-->

<script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Angular JavaScript -->



<!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>-->
<!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-route.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-resource.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-cookies.min.js"></script>
<!-- Custom Angular JavaScript-->
<!--<script src="js/app.js"></script>
<script src="js/controllers.js"></script>
<script src="js/services.js"></script>-->
<!--Internacionalizacion -->
<!--<script src="http://code.angularjs.org/1.2.9/i18n/angular-locale_es-cr.js"></script>-->
<!--Raphael-->
<script type="text/javascript" src="../vendor/raphael/raphael.min.js"></script>

</body>

</html>
