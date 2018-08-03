<?php

namespace App\Http\Controllers;
use App\estudios;
use App\User;
use App\roles;
use Request;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class adminController extends Controller
{

    public function index()
    {
        return view('Layout.welcome');
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
        $rol = roles::pluck('name','id_rol')->all();
        echo $rol;

        $data = [
        'datos' => $datos,
        'rol' => $rol  
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
          $datos = User::create($usuario);
          return Redirect::to('admin/usuarios');
    }
}
