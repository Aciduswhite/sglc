@extends('Layout.panel')
@section('content')
<header class="panel_header">
    <h2 class="title pull-left">Bienvenido {{Auth::user()->nombre}}  </h2>
</header>
@stop
