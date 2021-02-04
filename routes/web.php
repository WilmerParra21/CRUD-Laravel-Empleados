<?php

use App\Http\Controllers\ContactoController;
use App\Mail\ContactoMail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
/*
App\Models\User::create([
    'name' => 'Luis',
    'email'=> 'Luis21@gmail.com',
    'password'=>bcrypt('5678')

]);
*/
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/empleado', [\App\Http\Controllers\EmpleadoController::class, 'listarEmpleados'])->name('empleado.index');

Route::get('empleado/{id}', [\App\Http\Controllers\EmpleadoController::class, 'buscarEmpleado'])->name('empleado.detalle');

Route::get('agregar', [\App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleado.agregar');

Route::post('empleado', [\App\Http\Controllers\EmpleadoController::class, 'agregarEmpleado'])->name('empleado.guardar');

Route::get('empleado/{id}/editar', [\App\Http\Controllers\EmpleadoController::class, 'editarEmpleado'])->name('empleado.editar');

Route::put('/empleado/{id}', [\App\Http\Controllers\EmpleadoController::class, 'actualizarEmpleado'])->name('empleado.update');

Route::get('/empleado/{id}/eliminar', [\App\Http\Controllers\EmpleadoController::class, 'eliminarEmpleado'])->name('empleado.delete');

Route::get('/contacto', [\App\Http\Controllers\ContactoController::class, 'index'])->name('emails.contacto');

Route::post('/contacto', [\App\Http\Controllers\ContactoController::class, 'Contacto'])->name('emails.enviar');

Auth::routes();

Auth::routes();

Auth::routes();
