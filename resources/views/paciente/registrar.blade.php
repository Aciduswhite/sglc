@extends('Layout.panel')
@section('content')
<header class="panel_header">
    <h2 class="title pull-left">Guardar Cliente - {{$datos->nombre}}</h2>
    </header>

{{ Form::open(array('url' => 'pacientes/' . $datos->id_paciente, 'id_paciente' => 'icon_validate', 'files' => true)) }}

<div class="col-md-12">

    <section class="box ">

        <div class="content-body">

            <div class="row">


            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <!--Nombre-->
                 {{ Form::label ('nombre', 'Nombre: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('nombre', $datos->nombre)}}
                     {{ Form::text ('nombre', $datos->nombre, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('nombre'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('nombre')}}
                     </div>
                     @endif
                 </div>
                    <!--Nombre-->
                 {{ Form::label ('app_paterno', 'Appelido paterno: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('app_paterno', $datos->app_paterno)}}
                     {{ Form::text ('app_paterno', $datos->app_paterno, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('app_paterno'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('app_paterno')}}
                     </div>
                     @endif
                 </div>
                    
                 {{ Form::label ('app_materno', 'Appelido Materno: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('app_materno', $datos->app_materno)}}
                     {{ Form::text ('app_materno', $datos->app_materno, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('app_materno'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('app_materno')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('curp', 'CURP: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('curp', $datos->curp)}}
                     {{ Form::text ('curp', $datos->curp, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('curp'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('curp')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('tel_casa', 'Telefono de Casa: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('tel_casa', $datos->tel_casa)}}
                     {{ Form::text ('tel_casa', $datos->tel_casa, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('tel_casa'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('tel_casa')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('tel_celular', 'Telefono Celular: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('tel_celular', $datos->tel_celular)}}
                     {{ Form::text ('tel_celular', $datos->tel_celular, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('tel_celular'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('tel_celular')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('dir_calle', 'Calle: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('dir_calle', $datos->dir_calle)}}
                     {{ Form::text ('dir_calle', $datos->dir_calle, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('dir_calle'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('app_paterno')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('dir_colonia', 'Colonia: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('dir_colonia', $datos->dir_colonia)}}
                     {{ Form::text ('dir_colonia', $datos->dir_colonia, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('dir_colonia'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('app_paterno')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('dir_numero', 'Numero: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('dir_numero', $datos->dir_numero)}}
                     {{ Form::text ('dir_numero', $datos->dir_numero, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('dir_numero'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('app_paterno')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('fecha_nacimiento', 'Fecha de Nacimiento: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('fecha_nacimiento', $datos->fecha_nacimiento)}}
                     {{ Form::text ('fecha_nacimiento', $datos->fecha_nacimiento, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('fecha_nacimiento'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('fecha_nacimiento')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('rfc', 'RFC: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('rfc', $datos->rfc)}}
                     {{ Form::text ('rfc', $datos->rfc, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('rfc'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('rfc')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('peso', 'Peso: ', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('peso', $datos->peso)}}
                     {{ Form::text ('peso', $datos->peso, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('peso'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('peso')}}
                     </div>
                     @endif
                 </div>
             </div>
             <div class="form-group">
                 {{ Form::label ('estatura', 'Estatura:', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('estatura', $datos->estatura)}}
                     {{ Form::text ('estatura', $datos->estatura, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('estatura'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('estatura')}}
                     </div>
                     @endif
                 </div>
             </div>
                     </div>
    </div>
</section>
</div>
            

@if($datos->id_paciente)
{{ Form::hidden ('_method', 'PUT') }}
@endif
<div class="text-right">
   {{ link_to('pacientes', 'Cancelar', array('class' => 'btn btn-warning')) }}
   {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
</div>
{{ Form::close() }}
@stop