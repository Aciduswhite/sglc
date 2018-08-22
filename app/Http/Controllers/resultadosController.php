<?php

namespace App\Http\Controllers;
use App\pacientes;
use App\resultados;
use App\estudios;
use App\orden_estudio;
Use App\ordenes;
Use App\pagos;
Use App\valores_resultado;
use Request;
use Barryvdh\DomPDF\Facade as PDF;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class resultadosController extends Controller
{
    public function c_pacientes(){
        $ordenes = ordenes::where([
            ['status_orden','=',1],
            ['status_resultado','=',0]])->get();
        foreach ($ordenes as $orden) {
            $costo = 0;
            $pago =0;
            foreach ($orden->orden_estudio as $estudio) {
                $costo += $estudio->estudio->costo_estudio;
            }
            $pagos = pagos::where('id_orden', $orden->id_orden)->get();
            foreach ($pagos as $pago_realizado) {
                $pago += $pago_realizado->monto;
            }
//echo "Costo: ".$costo."<br>";
//echo "Pago:".$pago."<br>";
            if (($costo/2)>$pago) {
                unset($orden->id_orden);
//array_diff($ordenes, array('9'));
//echo "Orden:".$orden->id_orden."<br>";
            }
//echo "orden:".$orden->id_orden."<br>";
        }
        return view('resultados.c_pacientes')->with('datos', $ordenes); 
    }
    public function estudios_paciente($id){
        $ordenes = ordenes::find($id);
        $orden_estudio = orden_estudio::where('id_orden', $id)->get();



        $data = [
            'orden' => $ordenes,
            'ordenes' => $orden_estudio,
        ];

        return view('resultados.estudios_p', $data);
//return view('resultados.c_pacientes')->with('data', $ordenes); 
    }
    public function registra_estudio($idorden,$id_resultado){
        $orden = ordenes::findorfail($idorden)->id_paciente;
        $paciente = pacientes::findorfail($orden);
        $campos = valores_resultado::where('id_resultado', $id_resultado)->get();
        $estudio = orden_estudio::where('id_resultado', $id_resultado)->get();
        $observaciones = resultados::findorfail($id_resultado)->observaciones;


        $data = [
            'orden' =>$idorden,
            'paciente' => $paciente,
            'resultado' =>$campos, 
            'estudio' => $estudio,
            'observaciones' =>$observaciones,
        ];

        return view('resultados.save_resultado', $data);

    }
    public function store_registra_estudio(Request $request,$id_paciente,$id_resultado){
        $inputs = Request::all();
        $count = 0;
        foreach ($inputs['name'] as $key ) {
            $data =valores_resultado::findorfail($inputs['id_resultadovalor'][$count]);
            $data->valor_registrado = $inputs['valor_registrado'][$count];
            $data->save();
            $count++;
        }
        $resultado = resultados::findorfail($id_resultado);
        $resultado->observaciones = $inputs['observaciones'];
        $resultado->id_usuario = Auth::user()->id_usuario;
        $resultado->save();
        return Redirect::to('/resultados/'.$id_paciente.'/estudios/');
    }
    public function liberar_orden($id){
        $orden = ordenes::findorfail($id);
        $paciente = pacientes::findorfail($orden->id_paciente);
        $name_pdf = $id."-".date("Y-m-d H-i-s")."-".$this->random().".pdf";
        $estudios =0;
        $datos = array(
            'orden' =>$orden,
            'fecha' => date("d/m/Y"),
            'paciente' =>$paciente,
        );
        foreach ($orden->orden_estudio as $resultado) {
            $estudios++; 
        }
        $datos['estudios'] = $estudios;
        self::pdf_resultado($datos,$name_pdf);
        $orden->status_resultado = 1;
        $orden->file = $name_pdf;
        
        if($orden->save()){

            return Redirect::back();
        }
    }
    public function pdf_resultado($datos,$name_pdf){

        $pdf = PDF::loadView('pdf.resultados', $datos)->save('pdf_resultados/'.$name_pdf); 
    }
    public function showresultados(){
        $ordenes = ordenes::where([
            ['status_orden','=',1],
            ['status_resultado','=',1],
            ['estatus_pago','=',1]])->get();
        return view('resultados.resultados')->with('datos', $ordenes);

    }
    public function showpdfres($id_orden){
        $orden = ordenes::findorfail($id_orden);
        return view('resultados.show_pdf')->with('datos', $orden);
    }
    public function random(){
        $password='';
        $listado = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZa"; 
        str_shuffle($listado);
        for( $i=1; $i<=8; $i++) {
            $password .= $listado[rand(0,strlen($listado))-1];
            str_shuffle($listado);
        }
        return $password;
    }
}
