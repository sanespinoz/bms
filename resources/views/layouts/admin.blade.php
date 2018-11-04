<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <title>
        </title>
        {!!Html::style('css/bootstrap.min.css')!!}
                        {!!Html::style('css/metisMenu.min.css')!!}
                        {!!Html::style('css/sb-admin-2.css')!!}
                        {!!Html::style('font-awesome/css/font-awesome.min.css')!!}
                        {!!Html::style('fontawesome-free/css/all.css')!!}
        <!-- Datepicker Files -->
        <link href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet"/>
        {!!Html::style('datePicker/css/bootstrap-datepicker.standalone.css')!!}
        <meta content="{{ csrf_token() }}" name="csrf-token"/>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        BMS
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            {!!Auth::user()->name!!}
                            <i class="fa fa-user fa-fw">
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
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="container">
                    @if (Session::has('errors'))
                    <div class="alert alert-warning text-center" role="alert">
                        Las credenciales que ingresaste no coinciden con nuestros registros.
                    </div>
                    @endif
                </div>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#">
                                    Usuario
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/user/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/user')!!}">
                                            Usuarios
                                        </a>
                                    </li>
                                </ul>
                            </li>
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
                            <li>
                                <a href="#">
                                    <i class="fa fa-folder-o">
                                    </i>
                                    Reportes
                                    <span class="fa arrow">
                                    </span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/reporte')!!}">
                                            <i class="fa fa-plus fa-fw">
                                            </i>
                                            Energía
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/tendencia')!!}">
                                            <i class="fa fa-list-ol fa-fw">
                                            </i>
                                            Tendencia de Consumo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/eficiencia')!!}">
                                            <i class="fa fa-list-ol fa-fw">
                                            </i>
                                            índice de Eficiencia Energética
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/performance')!!}">
                                            <i class="fa fa-list-ol fa-fw">
                                            </i>
                                            Eficiencia de Luminarias
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                @yield('content')
            </div>
        </div>
        {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}
    {!!Html::script('datePicker/js/bootstrap-datepicker.js')!!}
        <!-- Languaje -->
        {!!Html::script('datePicker/locales/bootstrap-datepicker.es.min.js')!!}             
    @section('scripts')
    @show
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
</html>
