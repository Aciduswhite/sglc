@extends('Layout.panel')
@section('content')
<div class="content-body">
	<header class="panel_header">
		<h2 class="title pull-left">Corte de caja - {{Auth::user()->app_paterno}} {{Auth::user()->app_materno}} {{Auth::user()->nombre}}</h2>
	</header>
	<section class="box ">
		{{ Form::open(array('url' => 'cortes/1', 'id' => 'icon_validate', 'files' => true)) }}
		<div class="form-row ">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group ">
				<label for="hora_inicio">Ingrese la Hora de Inicio</label>
				<div class="controls ">
					<input type="time" name="hora_inicio" class="" required  value="">
					@if($errors->first('hora_inicio'))
					<div class="alert alert-error alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						{{$errors->first('hora_inicio')}}
					</div>
					@endif
				</div>
			</div>
			<div class="form-group ">
				<label for="hora_cierre">Ingrese la Hora del Corte</label>
				<div class="controls ">
					<input type="time" name="hora_cierre" class="" required  value="{{$hora}}">
					@if($errors->first('hora_cierre'))
					<div class="alert alert-error alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						{{$errors->first('hora_cierre')}}
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="text-left">
			{{ Form::submit('Continuar', array('class' => 'btn  btn-success')) }}
			{{ Form::hidden ('_method', 'GET') }}
		</div>
		{{ Form::close() }}
	</section>
</div>
@stop