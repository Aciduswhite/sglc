@extends('Layout.panel')
@section('content')
@if ($datos->count())
<header class="panel_header">
    <h2 class="title pull-left">LISTA DE PACIENTES POR COBRAR</h2>
</header>
<table id="a8" class="table table-striped dt-responsive display">
    <thead>
        <tr>
            <th>Folio</th>
            <th>Nombre</th>
            <th>CURP</th>
            <th>Estudio(s)</th>
            <th>Costo Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach($datos as $orden)
        
        <tr>
            <input type="hidden" {{$total = 0}} @foreach($orden->orden_estudio as $estudio){{$total += (int)$estudio->estudio->costo_estudio}} @endforeach > 
            <th>{{$orden->id_orden}}</th>
            <th>{{$orden->pacientes->app_paterno}} {{$orden->pacientes->app_materno}}<br>{{$orden->pacientes->nombre}}</th>
            <th>{{$orden->pacientes->curp}}</th>
            <th>@foreach($orden->orden_estudio as $estudio){{$estudio->estudio->nombre_estudio}}<br>  @endforeach</th>
            <th>{{$total}}</th>
            <th>
                <a href="/pacientes/pagos/{{$orden->id_orden}}" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated bounce" data-toggle="tooltip" data-original-title="Generar Pago" data-placement="top">
                    <i class="fa fa-usd" >PAGAR</i>
                </a>
            </th>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No hay registros disponibles</p>
    @endif
    @stop