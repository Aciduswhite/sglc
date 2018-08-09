@extends('Layout.panel')
@section('content')


{{ Form::open(array('url' => 'resultados/' . $paciente->id_paciente .'/estudios/'.$resultado[0]->id_resultado, 'id_paciente' => 'icon_validate', 'files' => true)) }}

<div class="col-md-12">

  <section class="box ">
    <header class="panel_header">
      <h2 class="title pull-left">Resultados para el estudio: {{$estudio[0]->estudio->nombre_estudio}} <br>
        Paciente: {{$paciente->app_paterno}} {{$paciente->app_materno}} {{$paciente->nombre}} </h2>
      </header>
      <div class="content-body">

        <div class="row">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @foreach($resultado as $campo)
          <div class="form-group">
            <input type="hidden" name="name[]" value="{{$campo->name}}">
            <input type="hidden" name="valor_referencia[]" value="{{$campo->valor_referencia}}">
            <label class="form-label">{{$campo->name}}</label>
            <div class="controls">
              <input type="text" name="valor_registrado[]" value="{{$campo->valor_registrado}}">
              <label> &nbsp;&nbsp;&nbsp;Valor de Referencia: {{$campo->valor_referencia}} {{$campo->unidad_referencia}}</label>
              <input type="hidden" name="id_resultadovalor[]" value="{{$campo->id_resultadovalor}}">
              <input type="hidden" name="unidad_referencia[]" value="{{$campo->unidad_referencia}}">
            </div>
          </div>
          @endforeach
           <div class="form-group">
             <label class="form-label">Observaciones:</label>
             <div class="controls">
              <textarea class="form-control" name="observaciones">{{$observaciones}}</textarea>
             </div>
           </div>
        </div>
      </div>
    </section>
  </div>
  <div class="text-right">
    {{ link_to('resultados/'.$paciente->id_paciente.'/estudios', 'Cancelar', array('class' => 'btn btn-warning')) }}
    {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
  </div>
  {{ Form::close() }}
  @stop