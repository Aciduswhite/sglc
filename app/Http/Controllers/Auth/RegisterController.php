<?php

namespace App\Http\Controllers\Auth;

use App\User;
//use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Redirect;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
       User::create([/*
            'nombre' => $data['name'],
            'user' => $data['usuario'],
            'password' => bcrypt($data['password']),
            'id_rol' => '1',*/
            'nombre' =>'Juan Manuel',
            'app_paterno' =>'Villanueva',
            'app_materno' =>'Arellano',
            'curp' =>'VIAJ921209HMNLRN02',
            'user' =>'Juan Manuel',
            'rfc' =>'VIAJ921209QQ9',
            'clave_seguro' =>'VIAJnosequemas',
            'tel_casa' =>'',
            'tel_celular_personal' =>'4431596112',
            'tel_celular_empresa' =>'',
            'tel_emergencia' =>'',
            'dir_calle' =>'Mirto',
            'dir_colonia' =>'Eduardo Ruiz',
            'dir_numero' =>'58',
            'fecha_nacimiento' =>'1992-12-09',
            'fecha_ingreso' =>'2018-05-01',
            'password' =>bcrypt('admin'),
            'estado_civil' =>'casado',
            'status_user' =>'1',
            'titulo' =>'Ingeniero',
            'id_rol' =>'1',
        ]);
       return  Redirect::to('/');
    }
    public function index(){
        return view('auth.register');
    }
}
