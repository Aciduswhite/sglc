@extends('Layout.panel')
@section('content')
<div class="content-body">
	<section class="box ">
		<header class="panel_header">
			<h2 class="title pull-left">Cotizacion </h2>
		</header>
		<div>
			{{ Form::open(array('url' => 'cotizador', 'id' => 'icon_validate', 'files' => true)) }}
			<div class="content-body">
				<div class="row">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name=pdf value="{{$pdf}}">
					<label for= email class="form-label">Correo:*</label>
					<div class="controls">
						<input type="email" name="email" value="{{$correo}}" class="form-control">
					</div>
				</div>
				<div class="text-right">
					{{ link_to('cotizador', 'Regresar', array('class' => 'btn btn-warning')) }}
					{{ Form::submit('Enviar Por Correo', array('class' => 'btn btn-success btn-send', 'onclick' => 'return confirm("Seguro que desea enviar el correo?");')) }}
					
				</div>
				{{ Form::close() }}
			</div>
		</div>
		<embed src="../../{{$pdf}}" type="application/pdf" width="100%" height="350" />
	</section>
</div>
@stop