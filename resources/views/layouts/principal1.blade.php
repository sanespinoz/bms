<!DOCTYPE html>
<html>
<head>
<title>Sistema de Automatización de Iluminación</title>
<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
{!!Html::script('assets/js/jquery.min.js')!!}




{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!}
{!!Html::script('assets/js/metisMenu.min.js')!!}
{!!Html::script('assets/js/sb-admin-2.js')!!}

{!!Html::script('https://raw.githubusercontent.com/moment/moment/develop/moment.js')!!}
{!!Html::script('https://raw.githubusercontent.com/moment/moment/master/locale/es.js')!!}

{!!Html::script('https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js')!!}

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a class="active" href="{{URL::to('/')}}"><i class="home"></i></a></li>
					<li><a href="{{URL::to('reviews')}}"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<li><a href="{{URL::to('/contacto')}}"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>

	

	<div class="main">
 <nav class="navbar navbar-default">
        <div class="container-fluid">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle Navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">BMS</a>
		    </div>



  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
			    	<li><a href="/">Inicio</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				    @if (Auth::guest())
				        
						<li><a href="{{route('register')}}">Registrarse</a></li>
				    @else
		                <li>
		                    <a href="#">{{ Auth::user()->name }}</a>
		                </li>
		                <li><a href="{{route('logout')}}">Cerrar Sesión</a></li>
		                
			        @endif
				</ul>
			</div>

		</div>
	</nav>

    <div class="container">
               @if (Session::has('errors'))
		    <div class="alert alert-warning text-center" role="alert">
		    Las credenciales que ingresaste no coinciden con nuestros registros.
			
		    </div>
		@endif
    </div>



		</div>
	
	@yield('content')

		


</div>
	<div class="footer">
		<h6>Disclaimer : </h6>
		<p class="claim">This is a freebies and not an official website, I have no intention of disclose any movie, brand, news.My goal here is to train or excercise my skill and share this freebies.</p>
		<a href="example@mail.com">example@mail.com</a>
		<div class="copyright">
			<p> Template by  <a href="http://w3layouts.com">  W3layouts</a></p>
		</div>
	</div>	






		<script type="text/javascript" src="assets/js/jquery.flexisel.js">
		$(window).load(function() {
			
		  $("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 4
					}
				}
			});
			});

		</script>
		
</body>
</html>