@extends('Layout.panel')
@section('content')
@if ($datos->count())
<div class="content-body">
<header class="panel_header">
    <h2 class="title pull-left">LISTA DE USUARIOS</h2>
    <div class="actions panel_actions pull-right">
        {{ HTML::link('admin/usuario/nuevo', 'Crear Nuevo', array('class' => 'btn btn-info')) }}
    </div>
</header>
    <table id="a8" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Fecha de Ingreso</th>
                <th>Nivel de usuario</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
@foreach($datos as $user)
        <tr>
            <th>{{$user->app_paterno}} {{$user->app_materno}} {{$user->nombre}}</th>
            <th>{{$user->user}}</th>
            <th>{{$user->fecha_ingreso}}</th>
            <th>{{$user->roles->name}}</th>
            <th>@if($user->status_user==1) Activo @else Inactivo @endif</th>
            <th>
                <a href="/admin/usuario/{{$user->id_usuario}}/edit" class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Editar registro" data-placement="top">
                    <i class="fa fa-pencil" ></i>
                </a>
                <!--
                <a href="/admin/usuario/{{$user->id_usuario}}/show" class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Mas Datos" data-placement="top">
                    <i class="fa fa-address-card" ></i>
                </a>-->
            </th>
@endforeach
		</tbody>
    </table>
@else
	<p>No hay registros disponibles</p>
@endif
</div>
@stop