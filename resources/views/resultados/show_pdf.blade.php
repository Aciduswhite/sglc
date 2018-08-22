@extends('Layout.panel')
@section('content')
<section class="box ">
	<header class="panel_header">
		<h2 class="title pull-left">
			Paciente: {{$datos->pacientes->app_paterno}} {{$datos->pacientes->app_materno}} {{$datos->pacientes->nombre}} <br>
			Orden: {{$datos->id_orden}}
		</h2>
	</header>
	<div></div>
	<embed src="../../pdf_resultados/{{$datos->file}}" type="application/pdf" width="100%" height="350" />
	</section>
	@stop	