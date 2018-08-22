@extends('Layout.panel')
@section('content')
<div class="content-body">
	<header class="panel_header">
		<h2 class="title pull-left">Resultados</h2>
	</header>
	<table id="a8"  class="table table-striped dt-responsive display results">
		<thead>
			<th>Folio</th>
			<th>Nombre</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($datos as $orden)
			<tr>
				<td>{{$orden->id_orden}}</td>
				<td>{{$orden->pacientes->app_paterno}} {{$orden->pacientes->app_materno}} {{$orden->pacientes->nombre}}</td>
				<td>
					<a href="/resultados/resultadopdf/{{$orden->id_orden}}" 
						class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Estudios" data-placement="left">
						<i class="fa fa-address-card" ></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop
@section('moreJS')
<script type="text/javascript">
	$('.results').dataTable( {
		"order": [[ 0, 'des' ]
	});
</script>
@stop
