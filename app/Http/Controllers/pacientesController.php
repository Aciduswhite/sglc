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
Use App\pagos;
use Request;
use Barryvdh\DomPDF\Facade as PDF;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class pacientesController extends Controller
{
    public function index()
    {
        return view('Layout.welcome');
    }


    public function create()
    {
        $datos = new pacientes();
        $histo = new historial_pacientes();
        $data = [
            'datos' => $datos,
            'datos2' => $histo,

        ];
        return view('paciente.registrar', $data);
    }


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
            'curp'=>'required|min:18|max:18'
        );

        $messages = array(
            'required' => 'Este campo es obligatorio',
            'min' => 'Requiere un mínimo de 18 caracteres',
            'max' => 'La curp no puede Exeder los 18 caracteres'
        );

        $validar = Validator::make($inputs, $rules, $messages);
        Request::flash();
        if($validar->fails()){
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }else {
            pacientes::create($paciente);
            $id = pacientes::all()->last()->id_paciente;
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
    public function show()
    {   
        $datos = pacientes::all();
        return view('paciente.pacientes')->with('datos', $datos);    
    }
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
            'nombre'=> 'required',
            'app_paterno'=> 'required',
            'app_materno'=> 'required',
            'fecha_nacimiento'=> 'required',
            'curp'=>'required|min:18|max:18'
        );

        $messages = array(
            'required' => 'Este campo es obligatorio',
            'min' => 'Requiere un mínimo de 18 caracteres',
            'max' => 'La curp no puede Exeder los 18 caracteres'
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
            'id_convenio' =>1,
            'id_descuento' =>1,
            'estatus_pago' =>0
        );
        if (ordenes::create($orden)) {
            $id_orden = ordenes::all()->last()->id_orden;
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
                    $resultado = resultados::all()->last()->id_resultado;
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
        return Redirect::to('pacientes/pagos');
    }
    public function consultar_cobros(){
        $ordenes = ordenes::where([
            ['status_orden','=',1],
            ['estatus_pago','=',0]])->get();
        return view('paciente.cobros')->with('datos', $ordenes);
    }
    public function generar_cobro($id){
        $data = new pagos();
        $orden = ordenes::findOrFail($id);
        $orden_estudio = orden_estudio::where([
            ['status_estudio','=',1],
            ['id_orden','=',$id]])->get();
        $monto_total = 0;
        foreach ($orden_estudio as $costo_estudio) {
            $monto_total += $costo_estudio->estudio->costo_estudio;
        }
        $pago_existente = pagos::where('id_orden' , $id)->get();
        foreach ($pago_existente as $pago) {
            $monto_total -= $pago->monto;
        }
        $data = [
            'datos' => $data,
            'orden' => $orden,
            'costo' => $monto_total,
        ];
        return view('paciente.cobros_save', $data);
    }
    public function store_pago(Request $request, $id){
        $inputs= Request::all();
        $pago = array(
            'fecha_pago' => date("Y-m-d H:i:s"),
            'monto' => $inputs['monto'],
            'id_orden' => $id,
            'file' => $id."-".date("Y-m-d H-i-s")."-".$inputs['monto'].".pdf",
        );
        if (pagos::create($pago)) {
            $orden_estudio = orden_estudio::where([
                ['status_estudio','=',1],
                ['id_orden','=',$id]])->get();
            $monto_total = 0;
            foreach ($orden_estudio as $costo_estudio) {
                $monto_total += $costo_estudio->estudio->costo_estudio;
            }
            $pago_acomulado = pagos::where('id_orden' , $id)->get();
            $total_pagado=0;
            foreach ($pago_acomulado as $pago) {
                $total_pagado += $pago->monto;
            }
            //$total_pagado+=$inputs['monto'] ;
            if ($total_pagado>= $monto_total) {
                $orden = ordenes::findOrFail($id);
                $orden->estatus_pago = 1;
                $orden->save();
            }
            $idpago = pagos::all()->last()->id_pago;

            self::pdf_pago($monto_total,$total_pagado,$idpago);
            return Redirect::to('pacientes/showpdf/'.$idpago);
        }
    }
    public function pdf_pago($monto,$total_pagado, $id){
        $restante = $monto - $total_pagado;
        $pago = pagos::findOrFail($id);
        $estudios = orden_estudio::where([
            ['status_estudio','=',1],
            ['id_orden','=',$pago->id_orden]])->get();

        $data = array(
            'monto'=> $monto, 
            'total_pagado' => $total_pagado,
            'adeudo' => $restante,
            'pago' => $pago,
            'fecha' => date("d-m-Y"),
            'estudios' =>$estudios,
        );
        $pdf = PDF::loadView('pdf.pdf_pagos', $data)->save('pdf_pagos/'.$pago->file); 
    }
    public function showpdf($id){
        $pago = pagos::findOrFail($id);

        return view('paciente.pagos')->with('pago', $pago);
    }
}


/*
        <h2 class="title pull-left">PACIENTE: {{$pago->orden->pacientes->app_paterno}} {{$pago->orden->pacientes->app_materno}} {{$pago->orden->pacientes->nombre}} <br> FOLIO DE SOLICITUD: {{$pago->orden->id_orden}}<br>FOLIO DE PAGO: {{$pago->id_pago}} </h2>
*/