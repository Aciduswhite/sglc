@extends('resultados.menu')
@section('content')
@if ($datos->count())
<header class="panel_header">
    <h2 class="title pull-left">LISTA DE PACIENTES</h2>
</header>
    <table id="a8" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Nombre</th>
                <th>Curp</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
@foreach($datos as $paciente)
		<tr>
			<th>{{$paciente->id_paciente}}</th>
			<th>{{$paciente->app_paterno}} {{$paciente->app_materno}} {{$paciente->nombre}}</th>
			<th>{{$paciente->curp}}</th>
            <th>
                <a href="/resultados/{{$paciente->id_paciente}}/estudios/" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Estudios" data-placement="top">
                    <i class="fa fa-address-card" ></i>
                </a>

            </th>

@endforeach
		</tbody>
    </table>
@else
	<p>No hay registros disponibles</p>
@endif
@stop