@extends('Layout.panel')
@section('content')
<section class="box ">
    <header class="panel_header">
        <h2 class="title pull-left">PACIENTE: {{$pago->orden->pacientes->app_paterno}} {{$pago->orden->pacientes->app_materno}} {{$pago->orden->pacientes->nombre}} <br> FOLIO DE SOLICITUD: {{$pago->orden->id_orden}}<br>FOLIO DE PAGO: {{$pago->id_pago}} </h2>
    </header>
    <!--
    <div  class="content-body">
    		<iframe src="https://docs.google.com/viewer?url=http://www.adizesca.com/site/assets/g-la_ley_de_murphy.pdf&embedded=true" width="900" height="300" style="border: none;"></iframe>
    </div>-->
    <div></div>
    <embed src="../../pdf_resultados/{{$pago->file}}" type="application/pdf" width="100%" height="350" />
</section>
@stop