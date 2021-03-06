@extends('Layout.panel')
@section('content')
<div class="content-body">
<header class="panel_header">
    <h2 class="title pull-left">LISTA DE PACIENTES</h2>
    <div class="actions panel_actions pull-right">
        {{ HTML::link('pacientes/create/', 'Crear Nuevo', array('class' => 'btn btn-info')) }}
    </div>
</header>
    <table  id="tab" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Telefono</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
@foreach($datos as $paciente)
		<tr>
			<th>{{$paciente->id_paciente}}</th>
			<th>{{$paciente->app_paterno}} {{$paciente->app_materno}} {{$paciente->nombre}}</th>
			<th>{{$paciente->curp}}</th>
			<th>{{$paciente->tel_casa}} / {{$paciente->tel_celular}} </th>
            <th>
                <a href="/pacientes/{{$paciente->id_paciente}}/edit" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Editar registro" data-placement="left">
                    <i class="fa fa-pencil" ></i>
                </a>
                <a href="/pacientes/{{$paciente->id_paciente}}/estudios" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Solicitar Estudios" data-placement="left">
                    <i class="fa fa-heartbeat" ></i>
                </a>
            </th>
        </tr>

@endforeach
		</tbody>
    </table>
</div>
@stop
@section('moreJs')
<script type="text/javascript">
    $('#tab').dataTable( {
    "order": [[ 0, 'des' ]]
} );
</script>
@stop