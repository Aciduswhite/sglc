@extends('Layout.panel')
@section('content')
<header class="panel_header">
    <h2 class="title pull-left">Bienvenido {{Auth::user()->nombre}}  </h2>
</header>
<div class="content-body">
	
	@if($mensaje)
	{{$mensaje}}
	@endif
</div>
@stop
