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

Route::get('empleado/{id}', [\App\Http\Controllers\EmpleadoController::class, 'buscarEmpleado'])->name('empleado.detalle');

Route::get('agregar', [\App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleado.agregar');

Route::post('empleado', [\App\Http\Controllers\EmpleadoController::class, 'agregarEmpleado'])->name('empleado.guardar');

Route::get('empleado/{id}/editar', [\App\Http\Controllers\EmpleadoController::class, 'editarEmpleado'])->name('empleado.editar');

Route::put('/empleado/{id}', [\App\Http\Controllers\EmpleadoController::class, 'actualizarEmpleado'])->name('empleado.update');

Route::get('/empleado/{id}/eliminar', [\App\Http\Controllers\EmpleadoController::class, 'eliminarEmpleado'])->name('empleado.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
