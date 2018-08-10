@extends('Layout.panel')
@section('content')
<div class="content-body">
	<header class="panel_header">
		<h2 class="title pull-left">Corte de caja - {{Auth::user()->app_paterno}} {{Auth::user()->app_materno}} {{Auth::user()->nombre}}</h2>
		<div class="actions panel_actions pull-right">
			{{ HTML::link('cortes', 'Atrás', array('class' => 'btn btn-default')) }}
		</div>
	</header>
	<section class="box" {{$total =0}}>
		@foreach($datos as $pago)
		<label hidden>{{$total+=$pago->monto}}</label>
		@endforeach
		{{ Form::open(array('url' => 'cortes/registrar', 'id' => 'icon_validate', 'files' => true)) }}
		<div class="form-row ">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="monto" value="{{$total}}">
			<input type="hidden" name="hora_inicio" value="{{$hora_inicio}}">
			<input type="hidden" name="hora_cierre" value="{{$hora_cierre}}">
			<label clas>Total:{{$total}}</label>
		</div>
		<div class="text-left">
			{{ Form::submit('Continuar', array('class' => 'btn  btn-success')) }}
			{{ Form::hidden ('_method', 'POST') }}
		</div>
		{{ Form::close() }}
		<table  class="table table-striped dt-responsive display">
			<thead>
				<tr>
					<th>Folio de Pago</th>
					<th>Folio de Orden</th>
					<th>Fecha de Pago</th>
					<th>Estudios</th>
					<th>Costo</th>
				</tr>
			</thead>
			<tbody>
				@foreach($datos as $pago)
				<tr>
					<th>{{$pago->id_pago}}</th>
					<th>{{$pago->orden->id_orden}}</th>
					<th>{{$pago->fecha_pago}}</th>
					<th>@foreach($pago->orden->orden_estudio as $estudio) {{$estudio->estudio->nombre_estudio}} <br> @endforeach</th>
					<th>{{$pago->monto}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</section>
</div>
@stop