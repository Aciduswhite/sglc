<?php

namespace App\Http\Controllers;

use Request;
Use App\pagos;
Use App\User;
Use App\corte_caja;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class corteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hora = date('H:i');
        //echo $hora;
        return view('corte.corte')->with('hora', $hora);
    }


    public function show(Request $request, $id)
    {
        $hora = Request::all();
        $date = date('Y-m-d');
        $histo = pagos::wherebetween('fecha_pago' ,[ $date.' '.$hora['hora_inicio'].':00', $date.' '.$hora['hora_cierre'].':00'])->get();
        $data = [
            'datos' => $histo,
            'hora_inicio' =>$hora['hora_inicio'].':00',
            'hora_cierre' => $hora['hora_cierre'].':'.date('s'),

        ];

        return view('corte.corte_save', $data);
    }
    public function store_corte(Request $request){
        $inputs = Request::all();
        $inputs['id_usuario'] = Auth::user()->id_usuario;
        $inputs['fecha_corte'] =  date('Y-m-d');
        $mensaje="Ha Saldio Algo Mal, Contacta Con el Area de TI";
        if($data = corte_caja::create($inputs)){
           $mensaje="Has Registrado Tu Corte De Caja Exitosamente";
          return view('Layout.welcome')->with('mensaje', $mensaje);   
        }
        return view('Layout.welcome')->with('mensaje', $mensaje); 
        
    }

}
