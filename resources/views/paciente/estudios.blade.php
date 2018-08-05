@extends('Layout.panel')
@section('content')
<header class="panel_header">
    <h2 class="title pull-left">LISTA DE ESTUDIOS</h2>
</header>
@if ($datos->count())
    <table id="a8" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Indicaciones</th>
                <th>Costo</th>
                <th>Duracion</th>
            </tr>
        </thead>
        <tbody>
@foreach($datos as $estudio)
		<tr>
			<th>{{$estudio->nombre_estudio}}</th>
			<th>{{$estudio->indicaciones}}</th>
			<th>{{$estudio->costo_estudio}}</th>
			<th>{{$estudio->duracion_estudio}}</th>
@endforeach
		</tbody>
    </table>
@else
	<p>No hay registros disponibles</p>
@endif
@stop