@extends('Layout.panel')
@section('content')


{{ Form::open(array('url' => 'resultados/' . $paciente->id_paciente .'/estudios/'.$id_resultado, 'id_paciente' => 'icon_validate', 'files' => true)) }}

<div class="col-md-12">

  <section class="box ">
<header class="panel_header">
  <h2 class="title pull-left">Resultados para el estudio: {{$estudio}} <br>
  Paciente: {{$paciente->app_paterno}} </h2>
</header>
    <div class="content-body">

      <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @foreach($campos as $campo)
        <div class="form-group">
         <input type="hidden" name="name" value="{{ $campo->name }}">
         <input type="hidden" name="referencia" value="{{ $campo->valor }}">
         <input type="hidden" name="id_resultado" value="{{ $id_resultado }}">
         {{ Form::label ('$campo->name',$campo->name.': *', array('class' => 'form-label')) }}
         <div class="controls">
           <i class=""></i>
           {{Form::hidden('$campo->name', '')}}
           {{ Form::text ('$campo->name', '', array( 'required' => 'required')) }}
           {{ Form::label ('','Valor de Referencia: '.$campo->valor, array('class' => 'form-label')) }}
           @if($errors->first('$campo->name'))
           <div class="alert alert-error alert-dismissible fade in">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
             {{$errors->first('$campo->name')}}
           </div>
           @endif
         </div>
       </div>
       @endforeach
     </div>
   </div>
 </section>
</div>





       @if($resultado->id_resultado)
       {{ Form::hidden ('_method', 'PUT') }}
       @endif
       <div class="text-right">
         {{ link_to('pacientes', 'Cancelar', array('class' => 'btn btn-warning')) }}
         {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
       </div>
       {{ Form::close() }}
       @stop