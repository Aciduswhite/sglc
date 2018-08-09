@extends('Layout.panel')
@section('content')
@if ($datos->count())
<div class="content-body">
    <header class="panel_header">
        <h2 class="title pull-left">ESTUDIOS</h2>
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
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $estudio)
            <tr data-id="{{$estudio->id_estudio}}" data-valor="{{$estudio->status_estudio}}">

               <th>{{$estudio->nombre_estudio}}</th>
               <th>{{$estudio->indicaciones}}</th>
               <th>{{$estudio->costo_estudio}}</th>
               <th>{{$estudio->duracion_estudio}}</th>
               <th><input  type="checkbox" class="status_estudio"  @if($estudio->status_estudio==true) checked @endif></th>
               <th>
                <a href="/admin/estudios/nuevo/{{$estudio->id_estudio}}" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Editar registro" data-placement="left">
                    <i class="fa fa-pencil" ></i>
                </a>
            </th>
        </tr>

        @endforeach
    </tbody>
</table>
@else
<p>No hay registros disponibles</p>
@endif
</div>
@stop
@section('moreJs')
{!! HTML::script('assets/js/estudios_estatus.js') !!}
@stop