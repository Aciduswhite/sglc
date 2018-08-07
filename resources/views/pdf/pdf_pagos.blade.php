<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div id="top">
		<table width="100%">
			<tr>
				<td ><img src="img/logo.png" width="120" height="120"></td>
				<td>
					<label>Folio de Pago: {{$pago->id_pago}}</label>
					<br>
					<label>Usuario: {{$pago->orden->pacientes->id_paciente}}</label>
				</td>
				<td>
					<label>Fecha: {{$fecha}}</label>
					<br>
					<label>Contraseña: {{$pago->orden->pacientes->password}}</label>
				</td>
			</tr>
		</table>
		<P>Paciente: {{$pago->orden->pacientes->app_paterno}} {{$pago->orden->pacientes->app_materno}} {{$pago->orden->pacientes->nombre}} </P>
	</div>
	<div id="concepto">
		<table width="100%" >
			<thead>
				<tr>
					<td>Folio de Estudio</td>
					<td>Estudios</td>
					<td>Costo</td>
				</tr>
			</tdead>
			<tbody>
				@foreach($estudios as $estudio)
				<tr>
					<td>{{$pago->id_orden}}</td>
					<td>{{$estudio->estudio->nombre_estudio}}</td>
					<td>{{$estudio->estudio->costo_estudio}}</td>
				</tr>
				@endforeach
				<tr>
					<td>Total</td>
					<td>~</td>
					<td>{{$monto}}</td>
				</tr>
				<tr>
					<td>Su Pago</td>
					<td>~</td>
					<td >{{$pago->monto}}</td>
				</tr>
				@if($adeudo>0)
				<tr>
					<td>Restante</td>
					<td>~</td>
					<td>{{$adeudo}}</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
	<br>
	<div id="footer">
		<div>
			<label>Recibo creado por Team Silent</label>
		</div>
	</div>

</body>
</html>