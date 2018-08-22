<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<img src="img/logo.png">
	</div>
	<!-- Cabecera-->
	<table width="100%">
		<tr>
			<td width="60%">Fecha alta: {{$orden->fecha_creacion}}</td>
			<td width="0%"></td>
			<td width="40%">Fecha Imprecion: {{$fecha}}</td>
		</tr>
		<tr>
			<td width="60%">Paciente: {{$paciente->app_paterno}} {{$paciente->app_materno}} {{$paciente->nombre}}</td>
			<td width="20%">Folio: {{$paciente->id_paciente}}</td>
			<td width="20%">Estudios: {{$estudios}} </td>
		</tr>
	</table>
	<!-- Cuerpo -->
	<table width="100%">
		<thead>
			<tr>
				<th width="40%">ESTUDIO</th>
				<th width="20%">RESULTADO</th>
				<th width="20%">UNIDAD</th>
				<th width="20%">VALOR DE REFERENCIA</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orden->orden_estudio as $oe)
			<tr>
				<td >
					<table >
						<thead>
							<tr>
								<th>{{$oe->estudio->nombre_estudio}}</th>
							</tr>
							<tr></tr>
						</thead>
					</table>
				</td>
				@foreach($oe->resultado->resultado as $estudio)
				<tr>
					<td width="40%">{{$estudio->name}}</td>
					<td width="20%">{{$estudio->valor_registrado}}</td>
					<td width="20%">{{$estudio->unidad_referencia}}</td>
					<td width="20%">{{$estudio->valor_referencia}}</td>
				</tr>	
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>