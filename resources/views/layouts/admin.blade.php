<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <title>
            SAI
        </title>
        {!!Html::style('css/bootstrap.min.css')!!}
                        {!!Html::style('css/metisMenu.min.css')!!}
                        {!!Html::style('css/buscador.css')!!}
                        {!!Html::style('css/sb-admin-2.css')!!}
                        {!!Html::style('font-awesome/css/font-awesome.min.css')!!}
                        {!!Html::style('fontawesome-free/css/all.css')!!}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <!-- Datepicker Files -->
        <link href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet"/>
        {!!Html::style('datePicker/css/bootstrap-datepicker.standalone.css')!!}
        <meta content="{{ csrf_token() }}" name="csrf-token"/>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="gestion">
                        @if(Auth::user()->rol == 'admin')
                        SAI Alarmas
                        @else
                        SAI
                        @endif
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            {!! Auth::user()->name !!}
                            <i class="fa fa-user fa-fw">
                            </i>
                            <i class="fa fa-caret-down">
                            </i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="{!!URL::to('logout')!!}">
                                    <i aria-hidden="true" class="fa fa-arrow-left">
                                    </i>
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            @if(Auth::user()->rol_id == 1)
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
                            @endif
                            @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 5)
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
                                    Dispositivo
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/dispositivo/create')!!}">
                                            Agregar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/dispositivo')!!}">
                                            Dispositivos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6)
                            <li>
                                <a href="#">
                                    Reportes
                                    <span class="fa arrow">
                                    </span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/reporte')!!}">
                                            <i aria-hidden="true" class="fa fa-pie-chart">
                                            </i>
                                            Energía
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/tendencia')!!}">
                                            <i aria-hidden="true" class="fa fa-line-chart">
                                            </i>
                                            Tendencia de Consumo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/eficiencia')!!}">
                                            <i aria-hidden="true" class="fa fa-line-chart">
                                            </i>
                                            índice de Eficiencia Energética
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/performance')!!}">
                                            <i aria-hidden="true" class="fa fa-bar-chart">
                                            </i>
                                            Performance de Luminarias
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
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
</html>
