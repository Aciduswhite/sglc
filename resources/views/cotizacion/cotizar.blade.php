@extends('Layout.panel')
@section('content')
<div class="col-md-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">Cotizacion de estudios</h2>
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
                <div class="text-right">
                    <input type="button" onclick="llenar()" value="Agregar Estudio" class="btn btn-success ">
                </div>
                
            </div>
        </div>
    </section>
</div>


{{ Form::open(array('url' => 'cotizador/', 'id' => 'icon_validate', 'files' => true)) }}

<div class="col-md-12">

    <section class="box ">

        <div class="content-body">
            <div class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="form-label">Correo:*</label>
                <input type="email" name="email" placeholder="Correo Electronico" class="form-control">
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

            <div class="text-right">
                {{ link_to('welcome/', 'Cancelar', array('class' => 'btn btn-warning')) }}
                {{ Form::submit('Cotizar', array('class' => 'btn  btn-success')) }}
            </div>
            {{ Form::close() }}
        </div>
    </section>
</div>
@stop
@section('moreJs')
{!! HTML::script('assets/js/pacientes_estudios.js') !!}
@stop