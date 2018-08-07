@extends('Layout.panel')
@section('content')

{{ Form::open(array('url' => 'admin/estudios/nuevo/' . $estudio->id_estudio , 'id' => 'icon_validate', 'files' => true)) }}
<div class="col-md-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">Estudio  - {{$estudio->nombre_estudio}}</h2>
        </header>
        <div class="content-body">
            <div class="form-row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class='form-group'>
                    <div class="col-md-6">
                        <label for="nombre">Nombre del Estudio:*</label>
                        <div class='controls'>
                            <input type="text" name="nombre" required value="{{$estudio->nombre_estudio}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="duracion">Duracion del Estudio:*</label>
                        <div class='controls'>
                            <input type="text" name="duracion" required value="{{$estudio->duracion_estudio}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="indicaciones">Indicaciones del Estudio:*</label>
                        <div class='controls'>
                            <input type="text" name="indicaciones" required value="{{$estudio->indicaciones}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="costo">Costo del Estudio:*</label>
                        <div class='controls'>
                            <input type="number" name="costo" required value="{{$estudio->costo_estudio}}" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" value="{{$id_campo = 1}}">
                    <div id="campos">
                        @foreach($campos as $campo)
                        <div id="{{$id_campo}}">
                            <br><p class="text-center">Campo Numero :{{$id_campo}} </p>
                            <div class='form-group col-md-4'>
                                <label for='{{$id_campo}}[]' class=''>Nombre:*</label>
                                <div class='controls'>
                                    <input type='text' value="{{$campo->name}}" name='{{$id_campo}}[]' required class='form-control'>
                                </div>
                            </div>
                            <div class='form-group col-md-4'>
                                <label for='{{$id_campo}}[]' class=''>Valor:*</label>
                                <div class='controls'>
                                    <input type='text' value="{{$campo->valor}}" name='{{$id_campo}}[]'  class='form-control'>
                                </div>
                            </div>
                            <div class='form-group col-md-4'>
                                <label for='{{$id_campo}}[]' class=''>Unidad:*</label>
                                <div class='controls'>
                                    <input type='text' value="{{$campo->unidad}}" name='{{$id_campo}}[]'  class='form-control'>
                                </div>
                            </div>
                        </div> 
                        <input type="hidden" value="{{$id_campo = $id_campo + 1}}">
                        @endforeach
                        <input type="hidden" id="id_campo"  value="{{$id_campo}}">
                    </div>
                    <div class="text-right">
                        <input type="button" value="Quitar Campo" class="btn btn-warning borrar">
                        <input type="button" onclick="nuevo_campo()" value="Agregar Nuevo Campo" class="btn  btn-success">
                    </div>

                    <br>
                </div>
                @if($estudio->id_estudio)
                {{ Form::hidden ('_method', 'PUT') }}
                @endif
                <div class="text-right">
                    {{ link_to('admin/estudios', 'Cancelar', array('class' => 'btn btn-warning')) }}
                    {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
</div>
@stop
@section('moreJs')
{!! HTML::script('assets/js/estudios.js') !!}
@stop

<!-- 
                        <br><p class="text-center">campo : 1</p>
                        <div class='form-group col-md-4'>
                            <label for='1[]' class=''>Nombre:*</label>
                            <div class='controls'>
                                <input type='text' name='1[]' required class='form-control'>
                            </div>
                        </div>
                        <div class='form-group col-md-4'>
                            <label for='1[]' class=''>Valor:*</label>
                            <div class='controls'>
                                <input type='text' name='1[]'  class='form-control'>
                            </div>
                        </div>
                        <div class='form-group col-md-4'>
                            <label for='1[]' class=''>Unidad:*</label>
                            <div class='controls'>
                                <input type='text' name='1[]'  class='form-control'>
                            </div>
                        </div>
                    </div>
-->