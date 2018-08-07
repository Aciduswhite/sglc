@extends('Layout.panel')
@section('content')



{{ Form::open(array('url' => 'admin/usuario/nuevo/' . $datos->id_usuario, 'id_usuario' => 'icon_validate', 'files' => true)) }}
<div class="col-md-12">
    <section class="box ">
        <div class="content-body">
            <div class="row">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--campo Nombre-->
                <div class="form-group">
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
             </div>
             <!--campo appellido paterno-->
             <div class="form-group">
                 {{ Form::label ('app_paterno', 'Apellido Paterno: *', array('class' => 'form-label')) }}
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
             </div>
             <!--campo appellido materno-->
             <div class="form-group">
                 {{ Form::label ('app_materno', 'Apellido Materno: *', array('class' => 'form-label')) }}
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
             <!--campo curp-->
             <div class="form-group">
                 {{ Form::label ('curp', 'Curp: *', array('class' => 'form-label')) }}
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
             <!--campo User-->
             <div class="form-group">
                 {{ Form::label ('user', 'User: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('user', $datos->user)}}
                     {{ Form::text ('user', $datos->user, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('user'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('user')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo rfc-->
             <div class="form-group">
                 {{ Form::label ('rfc', 'RFC: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('rfc', $datos->rfc)}}
                     {{ Form::text ('rfc', $datos->rfc, array('class' => 'form-control')) }}
                     @if($errors->first('rfc'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('rfc')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo clave seguro-->
             <div class="form-group">
                 {{ Form::label ('clave_seguro', 'Clave Seguro: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('clave_seguro', $datos->clave_seguro)}}
                     {{ Form::text ('clave_seguro', $datos->clave_seguro, array('class' => 'form-control', '    ' => 'required')) }}
                     @if($errors->first('clave_seguro'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('clave_seguro')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo telefono casa-->
             <div class="form-group">
                 {{ Form::label ('tel_casa', 'Telefono de Casa: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('tel_casa', $datos->tel_casa)}}
                     {{ Form::text ('tel_casa', $datos->tel_casa, array('class' => 'form-control')) }}
                     @if($errors->first('tel_casa'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('tel_casa')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo Telefono celular -->
             <div class="form-group">
                 {{ Form::label ('tel_celular_personal', 'Celular Personal: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('tel_celular_personal', $datos->tel_celular_personal)}}
                     {{ Form::text ('tel_celular_personal', $datos->tel_celular_personal, array('class' => 'form-control')) }}
                     @if($errors->first('tel_celular_personal'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('tel_celular_personal')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo celular empresa-->
             <div class="form-group">
                 {{ Form::label ('tel_celular_empresa', 'Celular Empresa: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('tel_celular_empresa', $datos->tel_celular_empresa)}}
                     {{ Form::text ('tel_celular_empresa', $datos->tel_celular_empresa, array('class' => 'form-control')) }}
                     @if($errors->first('tel_celular_empresa'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('tel_celular_empresa')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo tel emergencia-->
             <div class="form-group">
                 {{ Form::label ('tel_emergencia', 'Telefono de Emergencia: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('tel_emergencia', $datos->tel_emergencia)}}
                     {{ Form::text ('tel_emergencia', $datos->tel_emergencia, array('class' => 'form-control')) }}
                     @if($errors->first('tel_emergencia'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('tel_emergencia')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo direccion calle-->
             <div class="form-group">
                 {{ Form::label ('dir_calle', 'Calle: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('dir_calle', $datos->dir_calle)}}
                     {{ Form::text ('dir_calle', $datos->dir_calle, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('dir_calle'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('dir_calle')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo colonia-->
             <div class="form-group">
                 {{ Form::label ('dir_colonia', 'colonia: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('dir_colonia', $datos->dir_colonia)}}
                     {{ Form::text ('dir_colonia', $datos->dir_colonia, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('dir_colonia'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('dir_colonia')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo numero-->
             <div class="form-group">
                 {{ Form::label ('dir_numero', 'Numero: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('dir_numero', $datos->dir_numero)}}
                     {{ Form::text ('dir_numero', $datos->dir_numero, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('dir_numero'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('dir_numero')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo fecha nacimiento-->
             <div class="form-group">
                 {{ Form::label ('fecha_nacimiento', 'Fecha De Nacimiento: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('fecha_nacimiento', $datos->fecha_nacimiento)}}
                     {{ Form::date ('fecha_nacimiento', $datos->fecha_nacimiento, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('fecha_nacimiento'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('fecha_nacimiento')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo fecha ingreso-->
             <div class="form-group">
                 {{ Form::label ('fecha_ingreso', 'Fecha De Ingreso: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('fecha_ingreso', $datos->fecha_ingreso)}}
                     {{ Form::date ('fecha_ingreso', $datos->fecha_ingreso, array('class' => 'form-control', 'required' => 'required')) }}
                     @if($errors->first('fecha_ingreso'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('fecha_ingreso')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo estado cvivil-->
             <div class="form-group">
                 {{ Form::label ('estado_civil', 'Estado Civil: *', array('class' => 'form-label')) }}
                 <div class="controls">
                     <i class=""></i>
                     {{Form::hidden('estado_civil', $datos->estado_civil)}}
                     {{ Form::text ('estado_civil', $datos->estado_civil, array('class' => 'form-control')) }}
                     @if($errors->first('estado_civil'))
                     <div class="alert alert-error alert-dismissible fade in">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         {{$errors->first('estado_civil')}}
                     </div>
                     @endif
                 </div>
             </div>
             <!--campo estatus usuario-->
             <div class="form-group">
                <label class="form-label" for="estatus_user" > Estatus Usuario: *</label>
                <div class="controls">
                    <select id="estatus_user" name="estatus_user" class="form-control " required >
                        <option @if($datos->estatus_user = 1) selected @endif  value="1">Activo</option>
                        <option @if($datos->estatus_user < 0) selected @endif value="0">Inactivo</option>
                    </select>
                </div>                
            </div>
            <!--campo titulo-->
            <div class="form-group">
             {{ Form::label ('titulo', 'Titulo: *', array('class' => 'form-label')) }}
             <div class="controls">
                 <i class=""></i>
                 {{Form::hidden('titulo', $datos->titulo)}}
                 {{ Form::text ('titulo', $datos->titulo, array('class' => 'form-control')) }}
                 @if($errors->first('titulo'))
                 <div class="alert alert-error alert-dismissible fade in">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                     {{$errors->first('titulo')}}
                 </div>
                 @endif
             </div>
         </div>
         <!--campo rol-->
         <div class="form-group">
            <label class="form-label" for="id_rol" > Rol: *</label>
            <div class="controls">
                <select id="id_rol" name="id_rol" class="form-control " required >
                    @foreach($rol as $roles)
                    @if($roles->id_rol <> 8)
                    <option @if($datos->id_rol == $roles->id_rol ) selected @endif value={{$roles->id_rol}} >{{$roles->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>                
        </div>

     <!--campo password-->
     <div class="form-group">
         {{ Form::label ('password', 'Password: *', array('class' => 'form-label')) }}
         <div class="controls">
             <i class=""></i>
             {{ Form::text ('password', "", array('class' => 'form-control', 'required' => 'required')) }}
             @if($errors->first('password'))
             <div class="alert alert-error alert-dismissible fade in">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                 {{$errors->first('password')}}
             </div>
             @endif
         </div>
     </div>

 </div>
</div>
</section>
</div>
@if($datos->id_usuario)
{{ Form::hidden ('_method', 'PUT') }}
@endif
<div class="text-right">
   {{ link_to('admin/usuarios', 'Cancelar', array('class' => 'btn btn-warning')) }}
   {{ Form::submit('Guardar', array('class' => 'btn  btn-success')) }}
</div>
{{ Form::close() }}
<script type="text/javascript">
  $("#fecha_nacimiento" ).datepicker( "option", "dateFormat", "dd-mm-yy" ); 
  $("#fecha_ingreso").datepicker( "option", "dateFormat", "dd-mm-yy" ); 
</script>
@stop
