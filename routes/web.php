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

Route::get('/searchAbil', 'getUsers@searchAbil');
Route::get('/searchTipo', 'getUsers@searchTipo');

//imagen
Route::post('imagen','getUsers@EditarImagen');

Route::get('pagos','ColegiadoController@pagoColegiados');
Route::get('pagos','ColegiadoController@pagoColegiados');
Route::post('busquedaColegiados','ColegiadoController@busquedaColegiados');
Route::post('busquedaColegiadosNombre','ColegiadoController@busquedaColegiadosNombre');


Route::post('registroPago','ColegiadoController@registroPago');


Route::get('pdfPrint','ColegiadoController@pdfPrintBoucher');

Route::get('vistaComprobante','ColegiadoController@vistaComprobante');


Route::get('fraccionamiento','ColegiadoController@fraccionamiento');
Route::post('busquedaColegiadosFrac','ColegiadoController@busquedaColegiadosFrac');

Route::post('registroFracc','ColegiadoController@registroFraccionamiento');

Route::post('rptCertificadoData','ColegiadoController@rptCertificadoData');

Route::post('extraeProvincia','ColegiadoController@extraeProvincia');
Route::post('extraeDistrito','ColegiadoController@extraeDistrito');

Route::post('saveCertificadoHabilidad','ColegiadoController@saveCertificadoHabilidad');




Route::get('fpdf','ColegiadoController@fpdf');

Route::post('pdf', function () {

	//$pdf = PDF::loadView();
	$pdf = PDF::loadHTML('<h1> TEXTO </h1>');

    return $pdf->stream();
});


Route::get('fa', function () {

	//$fpdf = new Fpdf(); 
    Fpdf::AddPage();
    Fpdf::SetFont('Courier', 'B', 18);
    Fpdf::Cell(50, 25, 'Hello World!');
    Fpdf::Output();

    //$headers = ['Content-Type'=>'application/pdf'];

    //return Response::make(Fpdf::Output(),200,$headers);

});

Route::get('f', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    

    $headers = ['Content-Type'=>'application/pdf'];
    return Response::make($fpdf->Output(),200,$headers);
});


Route::resource('especilidad', 'EspecialidadController');
Route::get('holas','EspecialidadController@index');

Route::get('api/params','getUsers@param');
// Route::post('especilidad', 'EspecialidadController@store'){

// };