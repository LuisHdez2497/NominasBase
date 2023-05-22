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

Route::get('/', 'HomeController@inicio')->name('inicio');
Route::get('agregar/empleado', 'HomeController@vistaCrearEmpleado')->name('vistaCrearEmpleado');
Route::get('editar/empleado/{empleado_id}', 'HomeController@vistaEditarEmpleado')->name('vistaEditarEmpleado');
Route::get('eliminar/empleado/{empleado_id}', 'HomeController@eliminarEmpleado')->name('eliminarEmpleado');
Route::get('eliminar/incapacidad/{incapacidad_id}', 'HomeController@eliminarIncapacidad')->name('eliminarIncapacidad');
Route::post('agregar/empleado', 'HomeController@guardarEmpleado')->name('guardarEmpleado');
Route::patch('editar/empleado/{empleado_id}', 'HomeController@actualizarEmpleado')->name('actualizarEmpleado');
Route::post('actualizarEmpleado/{empleado_id}', 'HomeController@actualizarPercepcionesEmpleado')->name('actualizarPercepcionesEmpleado');
Route::get('generar-pdf/{empleado_id}', 'HomeController@imprimirNomina')->name('imprimirNomina');
