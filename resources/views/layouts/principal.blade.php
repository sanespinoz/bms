<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="cache-control" content="must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>
        SAI
    </title>
    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">
    <link href="css/monitoreo.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <!-- <link href="js/metisMenu.min.css" rel="stylesheet">-->
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js" type="text/javascript">
    </script>
</head>
<script>
    $(function(){
        <?php
        if (Auth::guest()){

          ?>
          $("ul li:first").show();

          $("section#contacto").hide();
          <?php }
          else{
           ?>

           $("ul li:first").show();
           $("ul li:seconds").show();
           $("section#login").hide();
           $("section#contacto").show();
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
                        <a id="iniciar" class="page-scroll" href="#login">Iniciar Sesión</a>
                        <!--tenia un ancla al pie de la pagina #Auth-->
                    </li>

                    @else
                    <!--<li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#dreams">
                            Luminarias
                        </a>a                    </li>-->
                        @if ((Auth::user()->rol_id != 5) && (Auth::user()->rol_id != 1) && (Auth::user()->rol_id != 6))
                        <li>
                            <a class="page-scroll" href="#monitoreo">
                                Monitoreo
                            </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contacto">
                                Contacto
                            </a>
                            <!--tenia un ancla al pie de la pagina #Auth-->
                        </li>

                        @endif
                        @if (Auth::user()->rol_id != 3)
                        <li>
                            <a class="page-scroll" href="gestion">
                                Gestión
                            </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contacto">
                                Contacto
                            </a>
                            <!--tenia un ancla al pie de la pagina #Auth-->
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
            <iframe allowfullscreen="true" frameborder="0" height="700px" mozallowfullscreen="true" src="http://192.168.10.10/bms/login.html" webkitallowfullscreen="true" width="1250px">
            </iframe>
            <!--    http://scada/BMS/login.html-->
        </section>
        <section class="container-fluid content-section text-center" id="contacto">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                {{Session::get('message')}}
            </div>
            @endif
            <div class="row" style="background-color:#022B59">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel-heading">
                        <br>
                        <h4>
                            CONTACTO
                        </h4>
                        <h5>
                            Estamos para ayudarle
                        </h5>
                        <div class="panel-body">
                            <div class="contact-form">
                                {!!Form::open(['route'=>'contacto','method'=>'POST'])!!}
                                {!! csrf_field() !!}

                                <div class="container-fluid  col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group row text-right">

                                        {!! Form::label('name', 'Nombre de usuario', ['class'=>'col-sm-6 col-form-label']) !!}
                                        <div class="col-sm-6">
                                            {!!Form::text('name', old('name'),['class'=> 'form-control'])!!}
                                            <small class="help-block" style="color:#e88;">{{ $errors->first('name') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        {!! Form::label('email', 'Correo Electrónico', ['class'=>'col-sm-6 col-form-label']) !!}
                                        <div class="col-sm-6">
                                            {!!Form::text('email', old('email'),['class'=> 'form-control'])!!}
                                            <small class="help-block" style="color:#e88;">{{ $errors->first('email') }}</small>
                                        </div>

                                    </div>
                                    <div class="form-group row text-right">
                                        {!! Form::label('subject', 'Asunto', ['class'=>'col-sm-6 col-form-label']) !!}
                                        <div class="col-sm-6">
                                            {!!Form::text('subject', old('subject'),['class'=> 'form-control'])!!}
                                            <small class="help-block" style="color:#e88;">{{ $errors->first('subject') }}</small>
                                        </div>

                                    </div>              

                                    <div class="form-group row text-right">
                                        {!! Form::label('mensaje', 'Mensaje', ['class'=>'col-sm-6 col-form-label']) !!}
                                        <div class="col-sm-6">
                                            {!!Form::textarea('mensaje', old('mensaje'),['class'=> 'form-control'])!!}
                                            <small class="help-block" style="color:#e88;">{{ $errors->first('mensaje') }}</small>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group text-center">
                                        {!!Form::submit('Enviar',['class' => 'btn btn-info'])!!}
                                    </div>
                                    {!!Form::close()!!}
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- Auth Section
-->
<section class="container-fluid content-section text-center" id="login">
    <div class="row text-center" style="background-color:#022B59">
        <br>
        <br>  
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php
        if (Auth::guest()){

          ?>
          <h4>INICIAR SESIÓN</h4>
          <div class="abs-center">
            <form action="login" method="POST">
                {!! csrf_field() !!}

                <div class="container-fluid  col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group row text-right">
                        {!! Form::label('email', 'Correo Electrónico', ['class'=>'col-sm-6 col-form-label']) !!}

                        <div class="col-sm-3">
                            {!! Form::email('email', old('email'), ['class'=> 'form-control','id'=>'email']) !!}
                            <small class="help-block" style="color:#e88;">{{ $errors->first('email') }}</small>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        {!! Form::label('contraseña', 'Contraseña', ['class'=>'col-sm-6 col-form-label']) !!}
                        <div class="col-sm-3">
                            {!! Form::password('password', ['class'=> 'form-control','id'=>'password']) !!}
                            <small class="help-block" style="color:#e88;">{{ $errors->first('password') }}</small>
                        </div>
                    </div>
                    <div class="form-group row text-center">
                        <input name="remember" type="checkbox"> Recuerdame
                    </div>
                    <div class="form-group row text-center">

                      <a class="forgot-password" href="password/email">Restablecer Contraseña</a>


                  </div>
                  <br>    

                  <div>
                    {!! Form::submit('Ingresar',['class' => 'btn btn-info']) !!}
                </div>
                <?php }

                ?>
                <br>
                <br>         
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </form>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
</section>
<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>
            Proyecto Final de Grado
        </p>
    </div>
</footer>
</body>

<script src="js/bootstrap.min.js">
</script>
<script src="../bower_components/moment/min/moment-with-locales.js">
</script>
<!-- <script src="js/metisMenu.min.js">
</script> -->
<script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js">
</script>
