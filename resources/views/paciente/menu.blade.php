@extends('Layout.panel')
@section('menu')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pacientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::to('pacientes/create')}}">Registrar</a></li>
            <li><a href="#">Actualizar</a></li>
            <li><a href="#">Consultar</a></li>
          </ul>
        </li>
        <li><a href="{{URL::to('pacientes/estudios')}}">Lista de Estudios</a></li>
        <li><a href="#">Cotizaciones</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="col-lg-12">
    <section class="box ">
        <div class="content-body">
            <div class="row">
				    
        @yield('content')

            </div>
        </div>
    </section>
</div>
@stop



