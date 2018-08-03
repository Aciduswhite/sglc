<?php
use App\pacientes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'Auth\LoginController@getLogin')->name('login');
Route::get('/registrar', 'Auth\RegisterController@index');
Route::post('/registrar', 'Auth\RegisterController@create')->name('register');
Route::post('/login', ['as' => 'auth/login', 'uses' => 'Auth\LoginController@post_login']);
Route::get('/logout', ['as' => 'auth/logout', 'uses' => 'Auth\LoginController@getLogout']);


Route::group(['middleware' => 'auth'], function () {
	
	//Ruta de Pacientes
	Route::get('pacientes/estudios', 'pacientesController@lista_estudios');
	Route::resource('pacientes', 'pacientesController');

	//Ruta de Administrador
	Route::get('admin','adminController@index');
	Route::get('admin/estudios','adminController@mostrar_estudios');
	Route::get('admin/usuarios', 'adminController@mostrar_usuarios');
	Route::get('admin/usuario/nuevo','adminController@create');
	Route::post('admin/usuario/nuevo','adminController@registrar_usuario');
	
	//Ruta de Resultados
	Route::get("resultados", "resultadosController@index");
	Route::get("resultados/pacientes", "resultadosController@c_pacientes");
	Route::get("resultados/{id}/estudios","resultadosController@estudios_paciente");
	Route::get("resultados/{id_paciente}/estudios/{id_estudio}","resultadosController@registra_estudio");
	Route::post("resultados/{id_paciente}/estudios/{id_estudio}","resultadosController@store_registra_estudio");
	

	
		
});



/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/