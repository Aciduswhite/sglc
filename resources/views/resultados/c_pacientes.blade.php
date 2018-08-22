@extends('Layout.panel')
@section('content')
<div class="content-body">
    @if ($datos->count())
    <header class="panel_header">
        <h2 class="title pull-left">LISTA DE Ordenes</h2>
    </header>
    <table id="a8" class="table table-striped dt-responsive display">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Paciente</th>
                <th>Curp</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $orden)
            @if($orden->id_orden)

            <tr>
             <th>{{$orden->id_orden}}</th>
             <th>{{$orden->pacientes->app_paterno}} {{$orden->pacientes->app_materno}} {{$orden->pacientes->nombre}}</th>
             <th>{{$orden->pacientes->curp}}</th>
             <th>
                <a href="/resultados/{{$orden->id_orden}}/estudios/" 
                    class="btn btn-info btn-xs pull-left right15" rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Estudios" data-placement="left">
                    <i class="fa fa-address-card" ></i>
                </a>

                {{ Form::open(array('url' => 'resultados/pacientes/'.$orden->id_orden)) }}
                {{ Form::hidden("_method", "POST") }} 
                <button type="submit" class="btn btn-xs btn-info pull-left right15"  rel="tooltip" data-animate=" animated pulse" data-toggle="tooltip" data-original-title="Liberar Orden" data-placement="top" onclick="return confirm('¿Seguro que deseas Liberar La Orden?');"><i class="fa fa-check-circle"></i></button>
                {{ Form::close() }}


            </th>
        </tr>
        @else
        @endif
        @endforeach
    </tbody>
</table>
@else
<p>No hay registros disponibles</p>
@endif
</div>
@stop