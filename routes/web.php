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
Route::post('/login', ['as' => 'auth/login', 'uses' => 'Auth\LoginController@post_login']);
Route::get('/logout', ['as' => 'auth/logout', 'uses' => 'Auth\LoginController@getLogout']);


Route::group(['middleware' => 'auth'], function () {
	Route::get('welcome', 'pacientesController@index');
	//Controlador de Pacientes
	//creacion de ordenes
	Route::get('pacientes/{id}/estudios', 'pacientesController@create_orden');
	Route::post('pacientes/{id}/estudios', 'pacientesController@store_orden');
	//creacion de pagos
	Route::get('pacientes/pagos', 'pacientesController@consultar_cobros');
	Route::get('pacientes/pagos/{id}', 'pacientesController@generar_cobro');
	Route::post('pacientes/pagos/{id}', 'pacientesController@store_pago');
	//lista de estudios para recepcionista
	Route::get('pacientes/estudios', 'pacientesController@lista_estudios');
	//pdf
	Route::get('pacientes/showpdf/{id}', 'pacientesController@showpdf');
	//manejo de pacientes
	Route::resource('pacientes', 'pacientesController');
	//Ruta de Administrador
	Route::get('admin','adminController@index');
	// estudios
	Route::get('admin/estudios','adminController@mostrar_estudios');
	Route::get('admin/estudios/nuevo', 'adminController@create_estudio');
	Route::post('admin/estudios/nuevo', 'adminController@nuevo_estudio');
	Route::get('admin/estudios/nuevo/{id}', 'adminController@edit_estudio');
	Route::put('admin/estudios/nuevo/{id}', 'adminController@update_estudio');
	//Route::put('admin/estudios/nuevo/{id}', 'adminController@update_estudio');
	//actualizar el status del estudios
	Route::get('admin/cambio_estudio/{id}/{valor}', 'adminController@cambio_status');
	//usuarios
	Route::get('admin/usuarios', 'adminController@mostrar_usuarios');
	Route::get('admin/usuario/nuevo','adminController@create');
	Route::post('admin/usuario/nuevo','adminController@registrar_usuario');
	Route::get('admin/usuario/{id}/edit','adminController@editar_usuario');
	Route::put('admin/usuario/nuevo/{id}','adminController@actualizar_usuario');	
	//Ruta de Resultados
	Route::get("resultados/pacientes", "resultadosController@c_pacientes");
	Route::post("resultados/pacientes/{id}", "resultadosController@liberar_orden");
	Route::get("resultados/{id}/estudios","resultadosController@estudios_paciente");
	Route::get("resultados/{id_paciente}/estudios/{id_resultado}","resultadosController@registra_estudio");
	Route::post("resultados/{id_paciente}/estudios/{id_resultado}","resultadosController@store_registra_estudio");
	Route::get("resultados/resultados", "resultadosController@showresultados");
	Route::get("resultados/resultadopdf/{id}","resultadosController@showpdfres");
	//Rutas de corte de caja
	Route::get('cortes', 'corteController@index');
	Route::get('cortes/{id}', 'corteController@show');
	Route::post('cortes/registrar', 'corteController@store_corte');
	//Rutas de Cotizaciones
	Route::get("cotizador","cotizacionesController@create");
	Route::post("cotizador","cotizacionesController@generar_cotizacion");
	Route::put("cotizador","cotizacionesController@envio");
	//Rutas de Reportes
	Route::get("reportes","reportesController@show");
	Route::post("reportes/ventas","reportesController@ventas");
	Route::post("reportes/estudio","reportesController@estudios");

});



/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
