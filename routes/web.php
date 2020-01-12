<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getUsers;
Route::get('/set_language/{lang}', 'Controller@setLanguage')->name( 'set_language');

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view ('seed.login');
});

Route::get('register', function () {
    return view('seed.register');
});
Route::get('forgotpassword', function () {
    return view('seed.forgotpassword');
});
Route::get('lock', function () {
    return view('index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'getUsers');
Route::get('/searchName', 'getUsers@searchName');
Route::get('/searchDni', 'getUsers@searchDni');
Route::get('/searchCodigo', 'getUsers@searchCodigo');

//imagen
Route::post('imagen','getUsers@EditarImagen');

Route::get('pagos','ColegiadoController@pagoColegiados');
Route::post('busquedaColegiados','ColegiadoController@busquedaColegiados');

Route::post('registroPago','ColegiadoController@registroPago');


Route::get('pdfPrint','ColegiadoController@pdfPrintBoucher');

Route::get('vistaComprobante','ColegiadoController@vistaComprobante');


Route::get('fraccionamiento','ColegiadoController@fraccionamiento');
Route::post('busquedaColegiadosFrac','ColegiadoController@busquedaColegiadosFrac');



Route::post('pdf', function () {

	//$pdf = PDF::loadView();
	$pdf = PDF::loadHTML('<h1> TEXTO </h1>');

    return $pdf->stream();
});


Route::resource('especilidad', 'EspecialidadController');
Route::get('holas','EspecialidadController@index');
// Route::post('especilidad', 'EspecialidadController@store'){

// };