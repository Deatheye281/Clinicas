<?php

use Illuminate\Support\Facades\Route;

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
})->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('hospital', 'HospitalController');
Route::resource('laboratorio', 'LaboratorioController');
Route::resource('medico', 'MedicoController');
Route::resource('diagnostico', 'DiagnosticoController');
Route::resource('sala', 'SalaController');
Route::resource('paciente', 'PacienteController');
Route::resource('detalle', 'DetalleController');
Route::resource('consulta', 'ConsultaController');
Route::resource('fechadia', 'FechadiaController');

/*Route::post('hospital/guardar', 'HospitalController@store');

Route::get('hospitales/', 'HospitalController@listar');

Route::post('diagnostico/guardar', 'DiagnosticoController@store');

Route::get('diagnosticos/', 'DiagnosticoController@listar');

Route::post('laboratorio/guardar', 'LaboratorioController@store');

Route::get('laboratorios/', 'LaboratorioController@listar');

Route::post('medico/guardar', 'MedicoController@store');

Route::get('medicos/', 'MedicoController@listar');

Route::post('paciente/guardar', 'PacienteController@store');

Route::get('pacientes/', 'PacienteController@listar');

Route::post('sala/guardar', 'SalaController@store');

Route::get('salas/', 'SalaController@listar');

Route::post('consulta/guardar', 'ConsultaController@store');

Route::get('consultas/', 'ConsultaController@listar');

Route::post('detalle/guardar', 'DetalleController@store');

Route::get('detalles/', 'DetalleController@listar');

Route::post('fechadia/guardar', 'FechadiaController@store');

Route::get('fechadias/', 'FechadiaController@listar');*/

Route::resource('Admin/users','Admin\UserController')->middleware('can:administrar-usuarios');

