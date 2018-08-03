@extends('Layout.panel')
@section('menu')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{URL::to('resultados/pacientes')}}">Consultar Paciente</a></li>
        <li><a href="{{URL::to('resultados/resultados')}}">Consultar Resultados</a></li>
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

