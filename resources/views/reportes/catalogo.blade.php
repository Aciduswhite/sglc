@extends('Layout.panel')
@section('content')
<section class="box ">
    <header class="panel_header">
        <h2 class="title pull-left">Catalogo de Reportes</h2>
    </header>


    <div class="content-body">
        {{ Form::open(array('url' => 'reportes/ventas', 'id' => 'icon_validate', 'files' => true)) }}
        <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="form-label">Fecha Incial:</label>
            <div class="controls" for='f_inicial'>
                <input type="date" name="f_inicial" class="form-control">
            </div>
            <label class="form-label" for='f_final'>Fecha Final:</label>
            <div class="controls">
                <input type="date" name="f_final" class="form-control">
            </div>
        </div>
        <br>
        <div class="text-right">
            {{ Form::submit('Generar Reporte de Ventas', array('class' => 'btn  btn-success')) }}
        </div>
        {{ Form::close() }}

    </div>
</section>
@stop
@section('moreJs')
<script type="text/javascript">
  $("#f_final" ).datepicker( "option", "dateFormat", "yyyy-mm-dd" ); 
  $("#f_inicial").datepicker( "option", "dateFormat", "yyyy-mm-dd" ); 
</script>
@stop