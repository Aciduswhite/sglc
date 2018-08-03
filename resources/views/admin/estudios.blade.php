@extends('admin.menu')
@section('content')
@if ($datos->count())
<header class="panel_header">
    <h2 class="title pull-left">LISTA DE ESTUDIOS</h2>
    <div class="actions panel_actions pull-right">
        {{ HTML::link('admin/estudios/nuevo', 'Crear Nuevo', array('class' => 'btn btn-info')) }}
    </div>
</header>
    <table id="a8" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Indicaciones</th>
                <th>Costo</th>
                <th>Duracion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
@foreach($datos as $estudio)
		<tr>
			<th>{{$estudio->nombre_estudio}}</th>
			<th>{{$estudio->indicaciones}}</th>
			<th>{{$estudio->costo_estudio}}</th>
			<th>{{$estudio->duracion_estudio}}</th>
            <th>
                <a href="/admin/estudios/{{$estudio->id_estudio}}/edit" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Editar registro" data-placement="top">
                    <i class="fa fa-pencil" ></i>
                </a>
            </th>

@endforeach
		</tbody>
    </table>
@else
	<p>No hay registros disponibles</p>
@endif
@stop