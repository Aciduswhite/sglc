<?php

namespace App\Http\Controllers;
use App\estudios;
use App\User;
use App\roles;
use App\campos_estudio;
use Request;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class adminController extends Controller
{

    public function index()
    {
        return view('Layout.welcome');
    }

    public function mostrar_estudios(){
        $datos = estudios::all();
        return view('admin.estudios')->with('datos', $datos);
    }
    public function mostrar_usuarios(){
        $datos = User::all();
        return view('admin.usuarios')->with('datos',$datos);
    }
    public function create(){
        $datos = new User();
        $rol = roles::all();
        $data = [
            'datos' => $datos,
            'rol' => $rol,
        ];
        return view('admin.usuarios_save', $data);

    }

    public function registrar_usuario(Request $request){
        $inputs = Request::all(); 
        $usuario =array(
            'nombre'=> $inputs['nombre'],
            'app_paterno'=> $inputs['app_paterno'],
            'app_materno'=> $inputs['app_materno'],
            'curp'=> $inputs['curp'],
            'user'=> $inputs['user'],
            'rfc'=> $inputs['rfc'],
            'clave_seguro'=> $inputs['clave_seguro'],
            'tel_casa'=> $inputs['tel_casa'],
            'tel_celular_personal'=> $inputs['tel_celular_personal'],
            'tel_celular_empresa'=> $inputs['tel_celular_empresa'],
            'tel_emergencia'=> $inputs['tel_emergencia'],
            'dir_calle'=> $inputs['dir_calle'],
            'dir_colonia'=> $inputs['dir_colonia'],
            'dir_numero'=> $inputs['dir_numero'],
            'fecha_nacimiento'=> $inputs['fecha_nacimiento'],
            'fecha_ingreso'=> $inputs['fecha_ingreso'],
            'estado_civil'=> $inputs['estado_civil'],
            'status_user'=> $inputs['estatus_user'],
            'titulo'=> $inputs['titulo'],
            'id_rol'=> $inputs['id_rol'],
            'password'=> bcrypt($inputs['password']),
        ); 
        $rules =  array(
            'nombre'=> 'required',
            'app_paterno'=> 'required',
            'app_materno'=> 'required',
            'fecha_nacimiento'=> 'required',
            'curp'=>'required|min:18|max:18',
            'clave_seguro'=> 'required|min:9|max:18',
            'user' => 'required|min:4|max:18',

        );
        $messages = array(
            'required' => 'Este campo es obligatorio',
            'min' => 'Requiere un minimo de caracteres',
            'max' => 'Exede los caracteres permitidos'
        );

        $validar = Validator::make($inputs, $rules, $messages);
        Request::flash();
        if($validar->fails()){
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }else {
            $datos = User::create($usuario);
        }

        return Redirect::to('admin/usuarios');
    }
    public function actualizar_usuario(Request $request, $id)
    {
        $inputs = Request::all(); 
        $usuario =array(
            'nombre'=> $inputs['nombre'],
            'app_paterno'=> $inputs['app_paterno'],
            'app_materno'=> $inputs['app_materno'],
            'curp'=> $inputs['curp'],
            'user'=> $inputs['user'],
            'rfc'=> $inputs['rfc'],
            'clave_seguro'=> $inputs['clave_seguro'],
            'tel_casa'=> $inputs['tel_casa'],
            'tel_celular_personal'=> $inputs['tel_celular_personal'],
            'tel_celular_empresa'=> $inputs['tel_celular_empresa'],
            'tel_emergencia'=> $inputs['tel_emergencia'],
            'dir_calle'=> $inputs['dir_calle'],
            'dir_colonia'=> $inputs['dir_colonia'],
            'dir_numero'=> $inputs['dir_numero'],
            'fecha_nacimiento'=> $inputs['fecha_nacimiento'],
            'fecha_ingreso'=> $inputs['fecha_ingreso'],
            'estado_civil'=> $inputs['estado_civil'],
            'status_user'=> $inputs['estatus_user'],
            'titulo'=> $inputs['titulo'],
            'id_rol'=> $inputs['id_rol'],
            'password'=> bcrypt($inputs['password']),
        ); 
        $rules =  array(
            'nombre'=> 'required',
            'app_paterno'=> 'required',
            'app_materno'=> 'required',
            'fecha_nacimiento'=> 'required',
            'curp'=>'required|min:18|max:18',
            'clave_seguro'=> 'required|min:9|max:18',
            'user' => 'required|min:4|max:18',

        );
        $messages = array(
            'required' => 'Este campo es obligatorio',
            'min' => 'Requiere un minimo de caracteres',
            'max' => 'Exede los caracteres permitidos'
        );

        $validar = Validator::make($inputs, $rules, $messages);
        Request::flash();
        if($validar->fails()){
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }else {
            $data = User::findorfail($id);
            $data->fill($usuario)->save();
        }
        return Redirect::to('admin/usuarios');
    }
    public function editar_usuario ($id){
        $datos = User::findorfail($id);
        $rol = roles::all();
        $data = [
            'datos' => $datos,
            'rol' => $rol,
        ];
        return view('admin.usuarios_save', $data);

    }
    public function create_estudio(){
        $estudios = new estudios();
        $campos = new campos_estudio();
        $data = [
            'estudio' => $estudios,
            'campos' => $campos,
        ];
        return view('admin.estudios_save', $data);
    }
    public function edit_estudio($id){
        $estudios =estudios::findorfail($id);
        $campos =campos_estudio::where('id_estudio' , $estudios->id_estudio)->get();
        $data = [
            'estudio' => $estudios,
            'campos' => $campos,
        ];
        return view('admin.estudios_save', $data);
    }
    public function nuevo_estudio(){
        $inputs = Request::all();
        $estudio = array(
            'nombre_estudio'=> $inputs['nombre'],
            'status_estudio'=> 1,
            'duracion_estudio'=> $inputs['duracion'],
            'indicaciones'=> $inputs['indicaciones'],
            'costo_estudio'=> $inputs['costo'],
        );
        $rules =  array(
            'nombre'=> 'required',
            'duracion'=> 'required',
            'indicaciones'=> 'required',
            'costo'=> 'required',

        );
        $messages = array(
            'required' => 'Este campo es obligatorio',
        );

        $validar = Validator::make($inputs, $rules, $messages);
        Request::flash();
        if($validar->fails()){
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }else {
            if($estudio = estudios::create($estudio)){
                foreach ($inputs as $campos) {
                    if (is_array($campos)) {
                        $campo = array(
                            'name'=> $campos[0],
                            'valor' => $campos[1],
                            'unidad' => $campos[2],
                            'id_estudio' => estudios::all()->last()->id_estudio
                        );
                        campos_estudio::create($campo);
                    }
                }
            }
            return Redirect::to('admin/estudios');
        }
    }

    public function update_estudio(Request $request,$id){
        $inputs = Request::all();
//obtenemos una coleccion de los campos pertenecientes al estudio
        $campos_existentes = campos_estudio::where('id_estudio' , $id)->get();
//hacemos una lista de los id de cada campo y los eliminamos!!! FOR THE HORDE!!!!
        foreach ($campos_existentes as $campo) {
            $dato = campos_estudio::findOrFail($campo->id_campo);
            $dato->delete();
        }
        $estudio = array(
            'nombre_estudio'=> $inputs['nombre'],
            'status_estudio'=> 1,
            'duracion_estudio'=> $inputs['duracion'],
            'indicaciones'=> $inputs['indicaciones'],
            'costo_estudio'=> $inputs['costo'],
        );
        $rules =  array(
            'nombre'=> 'required',
            'duracion'=> 'required',
            'indicaciones'=> 'required',
            'costo'=> 'required',

        );
        $messages = array(
            'required' => 'Este campo es obligatorio',
        );

        $validar = Validator::make($inputs, $rules, $messages);
        Request::flash();
        if($validar->fails()){
            return Redirect::back()->withInput(Request::all())->withErrors($validar);
        }else {
//agarramos el estudio a modificar
            $est = estudios::findorfail($id);
//lo llenamos y lo guardamos, ademas comprobamos si fue posible o no
            if($est->fill($estudio)->save()){
//recorremos los valores del request
                foreach ($inputs as $campos) {

//revisamos si son arrays(campos)
                    if (is_array($campos)) {
                        $campo = array(
                            'name'=> $campos[0],
                            'valor' => $campos[1],
                            'unidad' => $campos[2],
                            'id_estudio' => $id
                        );
                        campos_estudio::create($campo);
                    }
                }
            }
        }
        return Redirect::to('admin/estudios');
    }
    public function cambio_status($id , $valor)
    {   
        //obteniendo los datos del cliente
        $datos = estudios::findorfail($id);
        //cambiando el valor de referencia de pago automatico ... lo se es un desmadre jaja 
        $datos->status_estudio = $valor;
        //actualizando el cliente
        $datos->save();
        return Redirect::to('admin/estudios');
    }
}

