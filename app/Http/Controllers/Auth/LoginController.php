<?php

namespace App\Http\Controllers\Auth;
use App\User;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout','getLogout');
    }
    public function showLogin()
    {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            $rol=Auth::User()->id_rol;

            if($rol == 1) {
                return view('Layout.panel');
            }
            return view('Layout.panel');
        }
        return view('Layout.panel');
    }

    public function post_login(Request $request)
    {
        $userdata = array(
            'user' => Request::get('user'),
            'password'=> Request::get('password')
        );


        if(Auth::attempt($userdata, true))
        {
                return $this->showLogin();

        }else {

            return Redirect::back()->withErrors(['Lo sentimos, tu inicio de sesión no es correcto.']);
        }


    }
    public function index(){
        return view('Layout.panel');
    }
}
