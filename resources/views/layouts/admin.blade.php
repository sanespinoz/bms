<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
            <meta content="IE=edge" http-equiv="X-UA-Compatible" />
                <meta content="width=device-width, initial-scale=1" name="viewport" />
                    <title>
                    </title>
                    {!!Html::style('assets/css/bootstrap.css') !!}
                    {!!Html::style('assets/css/metisMenu.min.css')!!}
                    {!!Html::style('assets/css/sb-admin-2.css')!!}
                    {!!Html::style('font-awesome/css/font-awesome.css')!!}

    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                    </button>
                    <a class="navbar-brand" href="/">
                        BMS Admin
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                           {!!Auth::user()->name!!}<i class="fa fa-user fa-fw">
                            </i>
                            <i class="fa fa-caret-down">
                            </i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#">
                                    <i class="fa fa-gear fa-fw">
                                    </i>
                                    Ajustes
                                </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="{!!URL::to('logout')!!}">
                                    <i class="fa fa-sign-out fa-fw">
                                    </i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#">
                                    Edificio
                                 </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/edificio/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/edificio')!!}">
                                            Edificios
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    Piso
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/pisos/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/pisos')!!}">
                                            Pisos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    Sector
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/sector/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/sector')!!}">
                                            Sectores
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    Grupo
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/grupo/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/grupo')!!}">
                                            Grupos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    Luminaria
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/luminaria/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/luminaria')!!}">
                                            Luminarias
                                        </a>
                                    </li>
                                </ul>
                            </li>
                          <!--  <li>
                                <a href="#">
                                    <i class="fa fa-folder-o">
                                    </i>
                                    Lámpara
                                    <span class="fa arrow">
                                    </span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/lampara/create')!!}">
                                            <i class="fa fa-plus fa-fw">
                                            </i>
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/lampara')!!}">
                                            <i class="fa fa-list-ol fa-fw">
                                            </i>
                                            Lámparas
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                @yield('content')
            </div>
        </div>
        {!!Html::script('assets/js/jquery.min.js')!!}
        {!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')!!}
        {!!Html::script('assets/js/metisMenu.min.js')!!}
        {!!Html::script('assets/js/sb-admin-2.js')!!}

        {!!Html::script('../bower_components/moment/moment.js')!!}
        {!!Html::script('../bower_components/moment/locale/es.js')!!}

        {!!Html::script('https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js')!!}
    </body>
    <script type="text/javascript">
        $(function() {
        $('#fecha_instalacion').datetimepicker({
          format: 'YYYY/MM/DD', 
        });
        });
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
         function resta(){
                var v = document.getElementById("vida");
                var hsact = document.getElementById("horas_activas");
                var trestante = v.value - hsact.value;
                 document.getElementById("tiempo_restante").value = trestante;
//limpiar las variables funcion clear a null
            }
    </script>
    @yield('script')
</html>