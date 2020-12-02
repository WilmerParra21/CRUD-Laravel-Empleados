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
});

Route::get('/empleado', [\App\Http\Controllers\EmpleadoController::class, 'listarEmpleados'])->name('empleado.index');

Route::get('empleado/{id?}', [\App\Http\Controllers\EmpleadoController::class, 'buscarEmpleado'])->name('empleado.detalle');

Route::get('agregar', [\App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleado.agregar');

Route::post('empleado', [\App\Http\Controllers\EmpleadoController::class, 'agregarEmpleado'])->name('empleado.guardar');