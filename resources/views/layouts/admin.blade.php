<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="cache-control" content="must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title style="font-weight: bold;">
        SAI
    </title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {{-- {!!Html::style('css/metisMenu.min.css')!!} --}}  
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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <a class="navbar-brand" href="gestion" style="font-weight: bold;">
                 
                    SAI
                    
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-weight: bold;">
                        {!! Auth::user()->name !!}
                        <i class="fa fa-user fa-fw">
                        </i>
                        <i class="fa fa-caret-down">
                        </i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="width: 94.25; height: 40";>
                        <li>
                            <a href="{!!URL::to('logout')!!}" style="font-weight: bold; text-align:center;">
                                <i aria-hidden="true" class="fa fa-arrow-left"> Salir
                                </i>                                    
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
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-users">
                                </i>
                                Usuario
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/user/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/user')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Usuarios
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-building">
                                </i>
                                Edificio
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/edificio/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/edificio')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Edificios
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-square">
                                </i>
                                Piso
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/pisos/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/pisos')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Pisos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-th-large">
                                </i>
                                Sector
                            </a>
                            <ul class="nav nav-second-level" style="font-weight: bold;">
                                <li>
                                    <a href="{!!URL::to('/sector/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/sector')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Sectores
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-th">
                                </i>
                                Grupo
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/grupo/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/grupo')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Grupos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 5)
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-lightbulb-o">
                                </i>
                                Luminaria
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/luminaria/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/luminaria')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Luminarias
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-tablet">
                                </i>
                                Dispositivo
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/dispositivo/create')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-newspaper-o">
                                        </i>
                                        Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/dispositivo')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-list">
                                        </i>
                                        Dispositivos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6)
                        <li>
                            <a href="#" style="font-weight: bold;">
                                <i aria-hidden="true" class="fa fa-file">
                                </i>
                                Reportes
                                <span class="fa arrow">
                                </span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/reporte')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-pie-chart">
                                        </i>
                                        Energía
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/tendencia')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-line-chart">
                                        </i>
                                        Tendencia de Consumo
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/eficiencia')!!}" style="font-weight: bold;">
                                        <i aria-hidden="true" class="fa fa-area-chart">
                                        </i>
                                        índice de Eficiencia Energética
                                    </a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/performance')!!}" style="font-weight: bold;">
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
        <div id="page-wrapper" align="left">
            @yield('content')
        </div>
    </div>
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}
    {!!Html::script('datePicker/js/bootstrap-datepicker.js')!!} 
    {!! Html::script('js/datepick.js') !!}
    
    <!-- Languaje -->
    {{-- {!!Html::script('datePicker/locales/bootstrap-datepicker.es.min.js')!!}    --}}           

</body>
</html>
