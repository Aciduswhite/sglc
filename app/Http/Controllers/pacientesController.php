<?php

namespace App\Http\Controllers;
use App\User;
use App\pacientes;
use App\estudios;
use App\historial_pacientes;
Use App\ordenes;
Use App\orden_estudio;
Use App\historial_creacion_orden;
Use App\valores_resultado;
Use App\resultados;
Use App\campos_estudio;
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
                'estatura' => $inputs['estatura'],
            );
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
        $historial= historial_pacientes::where('id_paciente',$paciente->id_paciente)->get();
        foreach ($historial as $h){
            $histo = $h;
        };
        $data = [
            'datos' => $paciente,
            'datos2' => $histo,

        ];
        return view('paciente.registrar', $data);
        //return view('paciente.registrar')->with('datos', $datos);
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
        'rfc'=>$inputs['rfc'],
    );
     $rules =  array(
        'nombre'=> 'required|min:4',
        'app_paterno'=> 'required|min:4',
        'app_materno'=> 'required|min:4',
        'fecha_nacimiento'=> 'required',
        'tel_celular'=> 'required',
    );

     $messages = array(
        'required' => 'Este campo es obligatorio',
        'min' => 'Requiere un mínimo de 4 caracteres',
    );

     $validar = Validator::make($inputs, $rules, $messages);
     Request::flash();
     if($validar->fails()){
        return Redirect::back()->withInput(Request::all())->withErrors($validar);
    }else {
        $data = pacientes::findOrFail($id);
        $data->fill($paciente)->save();
        $historial=array(
            'id_paciente' => $id,
            'id_usuario' => Auth::user()->id_usuario,
            'id_motivo' => '2',
            'fecha' => date("Y-m-d H:i:s"),
            'estatura' => $inputs['estatura'],
            'peso' => $inputs['peso'],
        );

        historial_pacientes::create($historial);

    }
    return Redirect::to('pacientes/show');
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

    public function create_orden($id){
        $paciente = pacientes::findOrFail($id);
        $estudios = estudios::all();
        $orden = new ordenes;
        $data = [
            'datos' => $paciente,
            'orden' => $orden,
            'estudios' => $estudios,
        ];
        return view('paciente.reg_paciente', $data);
    }
    public function store_orden(Request $request, $id){
        $inputs= Request::all();
        $orden=array(
            'fecha_creacion' =>date("Y-m-d H:i:s"),
            'status_orden' => 1,
            'id_paciente' => $id,
            'id_convenio' =>0,
            'id_descuento' =>0
        );
        if (ordenes::create($orden)) {
            $id_orden = ordenes::all()->last();
            $id_orden  = $id_orden['id_orden'];
            $hco = array(
                'id_motivo' =>1,
                'id_usuario' =>Auth::user()->id_usuario,
                'id_orden' =>$id_orden,
                'fecha_modificacion'=> date("Y-m-d H:i:s"));
            if(historial_creacion_orden::create($hco)){
                $resultados= array(
                    'observaciones' => "",
                    'fecha_registro' =>date("Y-m-d H:i:s"),
                    'id_usuario' =>Auth::user()->id_usuario
                );
                if (resultados::create($resultados)) {
                    $resultado = resultados::all()->last();
                    $resultado = $resultado->id_resultado;
                    foreach ($inputs['estudio'] as $estudio) {
                        $est = campos_estudio::where('id_estudio',$estudio)->get();
                        foreach ($est as $value) {
                            $result = array('name' =>$value['name'],
                                'valor_referencia' =>($value['valor'] .' '. $value['unidad']),
                                'valor_registrado' =>"",
                                'id_resultado' =>$resultado
                            );
                            valores_resultado::create($result);
                        }
                        $oe = array(
                            'id_orden' => $id_orden,
                            'id_estudio' => (int) $estudio,
                            'status_estudio' => 1,
                            'id_resultado' => $resultado
                        );
                        orden_estudio::create($oe);
                    }
                }

            }

        }
        return Redirect::to('pacientes/show');
    }
}


