<?php

namespace App\Http\Controllers;
use App\User;
use App\pacientes;
use App\estudios;
use App\historial_pacientes;
use Request;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class pacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Layout.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $datos = new pacientes();
         return view('paciente.registrar')->with('datos', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = Request::all();
        $paciente = array(
            'nombre'=>$inputs['nombre'],
            'app_paterno'=>$inputs['app_paterno'],
            'app_materno'=>$inputs['app_materno'],
            'curp'=>$inputs['curp'],
            'tel_casa'=>$inputs['tel_casa'],
            'tel_celular'=>$inputs['tel_celular'],
            'dir_calle'=>$inputs['dir_calle'],
            'dir_colonia'=>$inputs['dir_colonia'],
            'dir_numero'=>$inputs['dir_numero'],
            'fecha_nacimiento'=>$inputs['fecha_nacimiento'],
            'fecha_registro'=> date("Y-m-d H:i:s"),
            'password'=>$this->password(),
            'rfc'=>$inputs['rfc'],
        );
        $rules =  array(
            'nombre'=> 'required',
            'app_paterno'=> 'required',
            'app_materno'=> 'required',
            'fecha_nacimiento'=> 'required',
            'tel_celular'=> 'required',
            );

        $messages = array(
            'required' => 'Este campo es obligatorio',
            'min' => 'Requiere un mínimo de 4 caracteres'
            );

        $validar = Validator::make($inputs, $rules, $messages);
        Request::flash();
         if($validar->fails()){
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }else {
            pacientes::create($paciente);
            $id = pacientes::all()->last();
            $id= $id->id_paciente;
            $historial=array(
                'id_paciente' => $id,
                'id_usuario' => Auth::user()->id_usuario,
                'id_motivo' => '1',
                'fecha' => date("Y-m-d H:i:s"),
                'peso' => $inputs['peso'],
                'estatura' => $inputs['estatura'],);
            historial_pacientes::create($historial);
            
        }
        return Redirect::to('pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $datos = pacientes::all();
        return view('paciente.pacientes')->with('datos', $datos);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = pacientes::findorfail($id);
        $historial= historial_pacientes::findorfail($paciente->id_paciente);
        $datos = array_merge($paciente,$historial);
        return view('paciente.registrar')->with('datos', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function lista_estudios(){
        $datos = estudios::where('status_estudio', 1)->get();
        return view('paciente.estudios')->with('datos', $datos); 
    }
    public function password(){
        $password='';
        $listado = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
        str_shuffle($listado);
        for( $i=1; $i<=8; $i++) {
        $password .= $listado[rand(0,strlen($listado))];
        str_shuffle($listado);
        }
        return $password;
    }
}
