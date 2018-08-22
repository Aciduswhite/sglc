@extends('Layout.panel')
@section('content')
<div class="content-body">
    <header class="panel_header">
        <h2 class="title pull-left">ESTUDIOS PARA la orden {{$orden->id_orden}} <br>
            Para el paciente: {{$orden->pacientes->app_paterno}} {{$orden->pacientes->app_materno}} {{$orden->pacientes->nombre}}</h2>
            <div class="actions panel_actions pull-right">
                {{ HTML::link('resultados/pacientes', 'Atrás', array('class' => 'btn btn-default')) }}
            </div>

        </header>
        <table id="a8" class="table table-striped dt-responsive display">
            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenes as $estudios)
                <tr>
                    <th>{{$estudios->resultado->id_resultado}}</th>
                    <th>{{$estudios->estudio->nombre_estudio}}</th>
                    <th>
                        <a href="/resultados/{{$orden->id_orden}}/estudios/{{$estudios->resultado->id_resultado}}" 
                            class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Estudios" data-placement="left">
                            <i class="fa fa-address-card" ></i>
                        </a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @stop
