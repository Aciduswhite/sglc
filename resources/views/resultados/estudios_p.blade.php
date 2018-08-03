@extends('resultados.menu')
@section('content')
@if ($datos->count())
<header class="panel_header">
    <h2 class="title pull-left">ESTUDIOS PARA EL PACIENTE {{$datos->nombre}}</h2>
</header>
    <table id="a8" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Nombre</th>
                <th>N° Orden</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
@foreach($datos->ordenes as $orden)
@foreach($orden->orden_estudio as $orden)


        <tr>
            <th>{{$orden->resultado->id_resultado}}</th>
            <th>{{$orden->resultado->orden_estudio->estudio->nombre_estudio}}</th>
            <th>{{$orden->id_orden}}</th>
            <th>
                <a href="/resultados/{{$datos->id_paciente}}/estudios/{{$orden->resultado->id_resultado}}" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Estudios" data-placement="top">
                    <i class="fa fa-address-card" ></i>
                </a>

            </th>


@endforeach
@endforeach
		</tbody>
    </table>
@else
	<p>No hay registros disponibles</p>
@endif
@stop