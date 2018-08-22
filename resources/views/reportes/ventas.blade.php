@extends('Layout.panel')
@section('content')
<section class="box ">
	<header class="panel_header">
		<h2 class="title pull-left">Reporte de ventas <br>
		Total: ${{$total}}</h2>
	</header>
	<div class="content-body">
		<table id="a8" class="table table-striped dt-responsive display">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Concepto</th>
					<th>Paciente</th>
					<th>Fecha</th>
					<th>Monto</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ventas as $venta)
				<tr>
					<th>{{$venta->id_pago}}</th>
					<th>{{$venta->orden->orden_estudio[0]->estudio->nombre_estudio}}</th>
					<th>{{$venta->orden->pacientes->app_paterno}} {{$venta->orden->pacientes->app_materno}} {{$venta->orden->pacientes->nombre}}</th>
					<th>{{$venta->fecha_pago}}</th>
					<th>${{$venta->monto}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
@stop