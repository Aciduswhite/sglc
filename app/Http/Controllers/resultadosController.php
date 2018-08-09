<?php

namespace App\Http\Controllers;
use App\pacientes;
use App\resultados;
use App\estudios;
use App\orden_estudio;
Use App\ordenes;
Use App\valores_resultado;
use Request;


//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class resultadosController extends Controller
{
    public function c_pacientes(){
    	$datos = pacientes::all(); 
    	return view('resultados.c_pacientes')->with('datos', $datos); 
    }
    public function estudios_paciente($id){
    	$paciente = pacientes::find($id);
        $ordenes = ordenes::where([
            ['status_orden','=',1],
            ['id_paciente','=',$id]])->get();

        $data = [
            'paciente' => $paciente,
            'orden' => $ordenes,
        ];

        return view('resultados.estudios_p', $data);
    }
    public function registra_estudio($id_paciente,$id_resultado){
        $paciente = pacientes::findorfail($id_paciente);
        $campos = valores_resultado::where('id_resultado', $id_resultado)->get();
        $estudio = orden_estudio::where('id_resultado', $id_resultado)->get();
        $observaciones = resultados::findorfail($id_resultado)->observaciones;


        $data = [
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
}
