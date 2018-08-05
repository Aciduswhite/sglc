
<!DOCTYPE html>
<html class=" ">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>SGLC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />    <!-- Favicon -->
    {!! HTML::style('assets/plugins/pace/pace-theme-flash.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/bootstrap/css/bootstrap.min.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/bootstrap/css/bootstrap-theme.min.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/fonts/font-awesome/css/font-awesome.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/css/animate.min.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/datepicker/css/datepicker.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/daterangepicker/css/daterangepicker-bs3.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/datatables/css/jquery.dataTables.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/plugins/multi-select/css/multi-select.css', array('media' => 'screen')) !!}
    {!! HTML::style('assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css', array('media' => 'screen'))!!}
    {!! HTML::style('assets/plugins/icheck/skins/square/_all.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/css/style.css', array('media'=>'screen'))!!}
    {!! HTML::style('assets/css/responsive.css', array('media'=>'screen'))!!}
    @yield('head')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- START TOPBAR -->
    <div class='page-topbar '>
        <div class='logo-area'>
        </div>
        <div class='quick-area'>
            <div class='pull-left'>
                <ul class="info-menu left-links list-inline list-unstyled">
                    <li class="sidebar-toggle-wrap">
                        <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class='pull-right'>
                <ul class="info-menu right-links list-inline list-unstyled">
                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle">
                         <!--Nombre De Usuario-->
                            <span> {{Auth::user()->nombre}} <i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu profile animated fadeIn">
                            <li class="last">
                            <a href="{{URL::to('logout')}}">
                                <i class="fa fa-lock"></i>
                                Salir
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END TOPBAR -->
<!-- START CONTAINER -->
<div class="page-container row-fluid">
    <!-- SIDEBAR - START -->
    <div class="page-sidebar ">
        <!-- MAIN MENU - START -->
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
            <ul class='wraplist'>
                <!-- Definicion de Usuarios-->
                @if(Auth::user()->id_rol == 1 )
                <li >
                    <a href="{{URL::to('/pacientes/show')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Pacientes</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/pacientes/estudios')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Lista de Estudios</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>
                <li >
                    <a href="{{URL::to('/resultados')}}">
                        <i class="fa fa-thermometer-full"></i>
                        <span class="title">Analisis</span>
                    </a>
                </li>

                @endif

                @if(Auth::user()->id_rol == 1 )
                <li >
                    <a href="{{URL::to('/admin')}}">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Administrador</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- MAIN MENU - END -->
        <div class="project-info text-center">
         TEAM SILENT
     </div>
 </div>
 <!--  SIDEBAR - END -->
 <!-- START CONTENT -->
 <section id="main-content" class=" ">
    <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">
                <div class="pull-left">
                    <h1 class="title">@yield('title')</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            @yield('content')
        </div>
    </section>
</section>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
@section('footer')
{!! HTML::script('assets/js/jquery-1.11.2.min.js') !!}
{!! HTML::script('assets/js/jquery.easing.min.js')!!}
{!! HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js')!!}
{!! HTML::script('assets/plugins/pace/pace.min.js')!!}
{!! HTML::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
{!! HTML::script('assets/plugins/viewport/viewportchecker.js') !!}
{!! HTML::script('assets/js/moment.min.js')!!}
{!! HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js') !!}
{!! HTML::script('assets/js/jquery.form.js') !!}
{!! HTML::script('assets/js/form-validation.js') !!}
{!! HTML::script('assets/plugins/icheck/icheck.min.js') !!}
{!! HTML::script('assets/plugins/datatables/js/jquery.dataTables.min.js') !!}
{!! HTML::script('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') !!}
{!! HTML::script('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js') !!}
{!! HTML::script('assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js')!!}
{!! HTML::script('assets/js/jquery.jeditable.js')!!}
{!! HTML::script('assets/js/scripts.js') !!}
@show
@section('moreJs')
@show
</body>
</html>