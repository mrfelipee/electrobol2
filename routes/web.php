<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ContactoController;


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

Auth::routes();

Route::get('prueba',[ContactoController::class,'listarx'])->name('persona.index');


Route::get('personas',[PersonaController::class,'index'])->name('persona.index');
Route::get('persona/create',[PersonaController::class,'create'])->name('persona.create');
Route::get('persona/edit/{persona}',[PersonaController::class,'edit'])->name('persona.edit');
Route::get('persona/show/{persona}',[PersonaController::class,'show'])->name('persona.show');
Route::post('persona/guardar',[PersonaController::class,'store'])->name('persona.guardar');
Route::patch('persona/actualizar/{persona}',[PersonaController::class,'update'])->name('persona.update');
Route::delete('eliminar/persona/{persona_id}',[PersonaController::class,'destroy'])->name('persona.destroy');





Route::get('contactos',[ContactoController::class,'index'])->name('contacto.index');
Route::get('contactos/listar',[ContactoController::class,'listar'])->name('contacto.listar');
Route::get('contacto/create/{persona_id}',[ContactoController::class,'create'])->name('contacto.crear');
Route::get('contacto/edit/{contacto}',[ContactoController::class,'edit'])->name('contacto.edit');
Route::get('contacto/show/{contacto}',[ContactoController::class,'show'])->name('contacto.show');
Route::post('contacto/guardar',[ContactoController::class,'store'])->name('contacto.guardar');
Route::patch('contacto/actualizar/{contacto}',[ContactoController::class,'update'])->name('contacto.update');
Route::delete('eliminar/contacto/{contacto_id}',[ContactoController::class,'destroy'])->name('contacto.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
