<?php

namespace App\Http\Controllers;
use App\estudios;
use App\campos_estudio;
use Mail;
use Request;
use Barryvdh\DomPDF\Facade as PDF;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class cotizacionesController extends Controller
{
	public function create(){
		$estudios = estudios::where('status_estudio',1)->get();
		$data = [
			'estudios' => $estudios,
		];
		return view('cotizacion.cotizar', $data);
	}
	public function generar_cotizacion(){
		$inputs = Request::all();
		$correo = $inputs['email'];
		$datos = array();
		$contador =0;
		foreach ($inputs['estudio'] as $estudio) {
			$datos[$contador] = estudios::where('id_estudio',$estudio)->get();
			$contador++;
		}
		$nombre = "temp/".$this->random().date('d-m-Y').".pdf";
		$data = array(
			'estudios' =>$datos,
			'fecha' =>date('d/m/Y'),
			'pdf'=> $nombre,
			'correo' =>$correo,
		);
		$pdf = PDF::loadView('pdf.cotizacion', $data)->save($nombre); 
		return view("cotizacion.enviar" , $data);
	}
	public function random(){
		$password='';
		$listado = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
		str_shuffle($listado);
		for( $i=1; $i<=8; $i++) {
			$password .= $listado[rand(0,strlen($listado))-1];
			str_shuffle($listado);
		}
		return $password;
	}
	public function envio(){
		$inputs = Request::all();
		$email = $inputs['email'];
		$file = $inputs['pdf'];
		$data = [
			'email'=>$email,
		];
		Mail::send(['html' => 'email.email'], ['data' => $data], function($message) use ($email,$file) {
			$message->to($email)
			->subject('Cotizacion Por Parte de Cedimi')
			->attach($file);

		});

		return "<div class='alert alert-success alert-dismissable'>
		<i class='fa fa-check'></i>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<b>Alerta!</b> El correo se ha enviado correctamente al correo ".$email.".</div>";
	}
}
