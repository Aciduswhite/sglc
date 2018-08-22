<?php

namespace App\Http\Controllers;
use App\estudios;
use App\pagos;
use Request;
use Barryvdh\DomPDF\Facade as PDF;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class reportesController extends Controller
{
	public function show(){
		$estudios = estudios::where('status_estudio',1)->get();
		$data= [
			'estudios'=>$estudios
		];
		return view('reportes.catalogo', $data);
	}
	public function ventas(){
		$inputs = Request::all();
		$finicio = $inputs['f_inicial']." 00:00:00";
		$ffin = $inputs['f_final']." 23:59:59";
		$ventas = pagos::whereBetween('fecha_pago', [$finicio, $ffin])->get();
		$total = 0;
		foreach ($ventas as $venta) {
			$total += $venta->monto;
		}
		$data=[
			'ventas' =>$ventas,
			'total' =>$total,
		];
		return view('reportes.ventas', $data);
	}
	public function estudios(){
		$inputs = Request::all();
		$finicio = $inputs['f_inicial']." 00:00:00";
		$ffin = $inputs['f_final']." 23:59:59";
		$ventas = pagos::whereBetween('fecha_pago', [$finicio, $ffin])->get();
		$total = 0;
		foreach ($ventas as $venta) {
			$total += $venta->monto;
		}
		$data=[
			'ventas' =>$ventas,
			'total' =>$total,
		];
		return view('reportes.ventas', $data);

	}
}
