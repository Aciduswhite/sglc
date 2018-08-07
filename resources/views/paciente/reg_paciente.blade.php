@extends('Layout.panel')
@section('content')
<div class="col-md-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">SOLICITUD DE ESTUDIOS PARA - {{$datos->nombre}}</h2>
        </header>
        <div class="content-body">
            <div class="form-group">
                <label class="form-label" > Estudio</label>
                <div class="controls">
                    <select id="Estudio" class="form-control " >
                        @foreach($estudios as $estudio)
                        <option id="{{$estudio->costo_estudio}}" value="{{$estudio->id_estudio}}">{{$estudio->nombre_estudio}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label id="cest"></label>
                </div>
                <div class="text-right">
                    <input type="button" onclick="llenar()" value="Agregar Estudio" class="btn btn-success ">
                </div>
                
            </div>
        </div>
    </section>
</div>


{{ Form::open(array('url' => 'pacientes/' . $datos->id_paciente .'/estudios', 'id' => 'icon_validate', 'files' => true)) }}

<div class="col-md-12">

    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">LISTA DE ESTUDIOS PARA - {{$datos->nombre}}</h2>
        </header>
        <div class="content-body">

            <div class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id_paciente" value="{{ $datos->id_paciente }}">
                <table class="table table-striped dt-responsive display">
                    <thead>
                        <tr>
                            <th>Estudio</th>
                            <th>Costo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="datos">
                    </tbody>
                    <tbody>
                        <th>Total:</th>
                        <th id="resultado">0</th>
                        <th></th>

                    </tbody>
                </table>
            </div>
            @if($orden->id_orden)
            {{ Form::hidden ('_method', 'PUT') }}
            @endif
            <div class="text-right">
                {{ link_to('pacientes/show', 'Cancelar', array('class' => 'btn btn-warning')) }}
                {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
            </div>
            {{ Form::close() }}
        </div>
    </section>
</div>
@stop
@section('moreJs')
{!! HTML::script('assets/js/pacientes_estudios.js') !!}
@stop