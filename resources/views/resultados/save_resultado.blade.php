@extends('resultados.menu')
@section('content')



{{ Form::open(array('url' => 'resultados/' . $paciente .'/estudios/'.$id_resultado, 'id_paciente' => 'icon_validate', 'files' => true)) }}

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

                

            

@if($resultado->id_resultado)
{{ Form::hidden ('_method', 'PUT') }}
@endif
<div class="text-right">
   {{ link_to('pacientes', 'Cancelar', array('class' => 'btn btn-warning')) }}
   {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
</div>
{{ Form::close() }}
@stop