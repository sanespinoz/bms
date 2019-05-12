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
        <!-- Datepicker Files -->
        <link href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet"/>
        {!!Html::style('datePicker/css/bootstrap-datepicker.standalone.css')!!}
        <meta content="{{ csrf_token() }}" name="csrf-token"/>
        {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
        <script>
            $(document).ready(function()
      { 
    var route =  window.location.href + "/alarmas";
        $.get(route, function(response, state){
       $('.modal-body').load(route,function(){
       

         $("#mostrarmodal").modal({show:true});
      });
    });
    });
        </script>
    </head>
</html>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="gestion">
                    SAI Alarmas
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
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="basicModal" class="modal fade" id="mostrarmodal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                    <h3>
                        Alarmas Registradas
                    </h3>
                </div>
                <div class="modal-body">
                    <h4>
                    </h4>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" data-dismiss="modal" href="#">
                        Cerrar
                    </a>
                </div>
            </div>
        </div>
        {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}
    {!!Html::script('datePicker/js/bootstrap-datepicker.js')!!}
        <!-- Languaje -->
        {!!Html::script('datePicker/locales/bootstrap-datepicker.es.min.js')!!}
       
        @section('scripts')

    @show
    </div>
</body>
