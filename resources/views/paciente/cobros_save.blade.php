@extends('Layout.panel')
@section('content')
<section class="box ">
    <header class="panel_header">
        <h2 class="title pull-left">NUMERO DE FOLIO - {{$orden->id_orden}} <br> TOTAL A PAGAR PARA - {{$orden->pacientes->app_paterno}} {{$orden->pacientes->app_materno}} {{$orden->pacientes->nombre}}<br> COSTO TOTAL/RESTANTE DE LOS ESTUDIOS - {{$costo}}</h2>

    </header>

    {{ Form::open(array('url' => 'pacientes/pagos/' . $orden->id_orden , 'id' => 'icon_validate', 'files' => true)) }}
    <div class="content-body">
        <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ Form::label ('monto', 'Monto:', array('class' => 'form-label')) }}
            <div class="controls">
             <i class=""></i>
             {{Form::hidden('monto', $datos->monto)}}
             {{ Form::number ('monto', $datos->monto, array('class' => 'form-control', 'required' => 'required')) }}
             @if($errors->first('monto'))
             <div class="alert alert-error alert-dismissible fade in">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                 {{$errors->first('monto')}}
             </div>
             @endif
         </div>
     </div>
     <br>
     @if($datos->id_pago)
     {{ Form::hidden ('_method', 'PUT') }}
     @endif
     <div class="text-right">
        {{ link_to('pacientes/pagos', 'Cancelar', array('class' => 'btn btn-warning')) }}
        {{ Form::submit('Pagar', array('class' => 'btn  btn-success')) }}
    </div>
    {{ Form::close() }}
</div>
</section>
@stop