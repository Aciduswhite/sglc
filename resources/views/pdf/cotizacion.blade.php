<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<img src="img/logo.png"><br>
	<input type="hidden" name="" {{$total=0}}>
	<div style="text-align: center;"><strong> Cotizacion De Estudios</strong></div>
	<div style="text-align: right; padding-right: 20%">Fecha:<strong>{{$fecha}}</strong></div>
<table style="padding-left: 10%;" width="80%">
	<tr>
		<th width="40%">Estudios</th>
		<th width="40$">Costo</th>
	</tr>
	@foreach($estudios as $est)
	{{$total +=$est[0]->costo_estudio}}
	<tr>
		<td width="40%">{{$est[0]->nombre_estudio}}</td>
		<td width="40$">{{$est[0]->costo_estudio}}</td>
	</tr>
	@endforeach
	<tr>
		<td width="40%" style="text-align: right;"><strong>Total:</strong></td>
		<td width="40$" >{{$total}}</td>
	</tr>
</table>
<div style="text-align: center;">Cotizacion Valida por 1 semana a partir de su creacion</div>
</body>
</html>