<?php

namespace App\Http\Controllers;
use App\pacientes;
use App\resultados;
use App\estudios;
use App\orden_estudio;

use Illuminate\Http\Request;

class resultadosController extends Controller
{
    public function c_pacientes(){
    	$datos = pacientes::all(); 
    	return view('resultados.c_pacientes')->with('datos', $datos); 
    }
    public function estudios_paciente($id){
    	$datos = pacientes::find($id);
    	return view('resultados.estudios_p')->with('datos', $datos); 
    }
    public function registra_estudio($id_paciente,$id_estudio){
        $paciente = pacientes::findorfail($id_paciente);
        $resultado = new resultados();
        $estudio;
        $campos;
        foreach (orden_estudio::where('id_resultado',$id_estudio)->get() as $name) {
            $estudio = $name->estudio->nombre_estudio;
            $campos = $name->estudio->campos;
        }
       

        $data = [
        'resultado' => $resultado,
        'paciente' => $paciente,
        'id_resultado' => $id_estudio,
        'estudio' => $estudio,
        'campos' => $campos  
        ];

        return view('resultados.save_resultado', $data);
       
    }
    public function store_registra_estudio($id_paciente,$id_estudio){
        
    }
}
