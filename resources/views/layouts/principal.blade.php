<!DOCTYPE html>
<html lang="en" ng-app="dreamsApp">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <title>
                        SAI
                    </title>
                    <!-- Bootstrap -->
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
                        <!-- Custom CSS -->
                        <link href="css/grayscale.css" rel="stylesheet">
                            <link href="css/monitoreo.css" rel="stylesheet">
                                <!-- MetisMenu CSS -->
                                <link href="js/metisMenu.min.css" rel="stylesheet">
                                    <!-- Custom Fonts -->
                                    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                                        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
                                            <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
                                                <script src="js/jquery.min.js" type="text/javascript">
                                                </script>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <script>
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
</html>
<body data-spy="scroll" data-target=".navbar-fixed-top" id="page-top" ng-controller="AppCtrl">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-main-collapse" data-toggle="collapse" type="button">
                    <i class="fa fa-bars">
                    </i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle">
                    </i>
                    Inicio
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    @if (Auth::guest())
                    <li>
                        <a class="page-scroll" href="#login">
                            Iniciar Sesión
                        </a>
                        <!--tenia un ancla al pie de la pagina #Auth-->
                    </li>
                    <li>
                        <a class="page-scroll" href="#contacto">
                            Contáctenos
                        </a>
                        <!--tenia un ancla al pie de la pagina #Auth-->
                    </li>
                    <!--  <li>
                        <a class="page-scroll" href="#register">
                            Registrarse
                        </a>
                    </li> -->
                    @else
                    <!--<li class="hidden">
                        <a href="#page-top"></a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="#dreams">
                            Luminarias
                        </a>
                    </li>
                    @if ((Auth::user()->rol_id != 5) && (Auth::user()->rol_id != 1) && (Auth::user()->rol_id != 6))
                    <li>
                        <a class="page-scroll" href="#monitoreo">
                            Monitoreo
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->rol_id != 3)
                    <li>
                        <a class="page-scroll" href="gestion">
                            Gestión
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{!!URL::to('logout')!!}">
                            Salir
                        </a>
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
                        <h1 class="brand-heading">
                            Sistema de gestión y automatización de la iluminación
                        </h1>
                        <p class="intro-text">
                            Gestión de recursos, monitoreo de dispositivos en tiempo real y visualización de reportes, para edificios de oficinas
                        </p>
                        <a class="btn btn-circle page-scroll" href="#dreams">
                            <i class="fa fa-angle-double-down animated">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- pisos Section -->
    <section id="monitoreo">
        <iframe allowfullscreen="true" frameborder="0" height="700px" mozallowfullscreen="true" src="http://192.168.1.120/BMS/login.html" webkitallowfullscreen="true" width="1250px">
        </iframe>
        <!--    </div>-->
    </section>
    <section class="container-fluid content-section text-center" id="contacto">
        <div class="row" style="background-color:#022B59">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-heading">
                    <h4>
                        Contáctenos
                    </h4>
                    <p>
                        Estamos para ayudarle
                    </p>
                    <div class="panel-body">
                        <div class="contact-form">
                            {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}
                    {!! csrf_field() !!}
                            <div class="col-md-6 contact-left">
                                <div class="form-group">
                                    <label>
                                        Nombre de Usuario
                                    </label>
                                    {!!Form::text('name',null,['class'=> 'form-control'])!!}
                                </div>
                                <label>
                                    Correo electrónico
                                </label>
                                {!!Form::text('email',null,['class'=> 'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-md-6 contact-right">
                            <label>
                                Mensaje
                            </label>
                            {!!Form::textarea('mensaje',null,['class'=> 'form-control'])!!}
                        </div>
                        <div class="col-md-6 contact-right">
                            {!!Form::submit('Enviar',['class' => 'btn btn-info'])!!}
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- Auth Section
-->
<section class="container-fluid content-section text-center" id="login">
    <div class="row" style="background-color:#022B59">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-heading">
                    <h4>
                        INICIAR SESIÓN
                    </h4>
                </div>
                <div class="panel-body">
                    <form action="login" method="POST">
                        {!! csrf_field() !!}
                @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                            <lu>
                                {{ $error }}
                            </lu>
                            @endforeach
                        </ul>
                        @endif
                        <div class="form-group">
                            <label>
                                Correo Electrónico
                            </label>
                            {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>
                                Contraseña
                            </label>
                            {!! Form::password('password', ['class'=> 'form-control','id'=>'password']) !!}
                        </div>
                        <div class="form-group text-center">
                            <input name="remember" type="checkbox">
                                Recuérdame
                            </input>
                        </div>
                        <div>
                            <a class="forgot-password" href="password/email">
                                Restablecer Contraseña
                            </a>
                        </div>
                        <div>
                            {!! Form::submit('Ingresar',['class' => 'btn btn-info']) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>
            Proyecto Final de Grado
        </p>
    </div>
</footer>
<script src="js/bootstrap.min.js">
</script>
<script src="../bower_components/moment/min/moment-with-locales.js">
</script>
<script src="js/metisMenu.min.js">
</script>
<script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js">
</script>
