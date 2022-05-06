<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\TipoarticuloController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\PagoController;


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

Route::get('prueba',[ArticuloController::class,'listar'])->name('prueba.index');


Route::get('personas',[PersonaController::class,'index'])->name('persona.index');
Route::get('persona/create',[PersonaController::class,'create'])->name('persona.create');
Route::get('persona/edit/{persona}',[PersonaController::class,'edit'])->name('persona.edit');
Route::get('persona/show/{persona}',[PersonaController::class,'show'])->name('persona.show');
Route::post('persona/guardar',[PersonaController::class,'store'])->name('persona.guardar');
Route::patch('persona/actualizar/{persona}',[PersonaController::class,'update'])->name('persona.update');
Route::delete('eliminar/persona/{persona_id}',[PersonaController::class,'destroy'])->name('persona.destroy');

Route::get('pagos',[pagoController::class,'index'])->name('pago.index');
Route::get('pago/create/{reparacion_id}',[pagoController::class,'create'])->name('pago.create');
Route::get('pago/edit/{pago}',[pagoController::class,'edit'])->name('pago.edit');
Route::get('pago/show/{pago}',[pagoController::class,'show'])->name('pago.show');
Route::post('pago/guardar',[pagoController::class,'store'])->name('pago.guardar');
Route::patch('pago/actualizar/{pago}',[pagoController::class,'update'])->name('pago.update');
Route::delete('eliminar/pago/{pago_id}',[pagoController::class,'destroy'])->name('pago.destroy');

Route::get('tecnicos',[TecnicoController::class,'index'])->name('tecnico.index');
Route::get('tecnico/create',[TecnicoController::class,'create'])->name('tecnico.create');
Route::get('tecnico/edit/{tecnico}',[TecnicoController::class,'edit'])->name('tecnico.edit');
Route::get('tecnico/show/{tecnico}',[TecnicoController::class,'show'])->name('tecnico.show');
Route::post('tecnico/guardar',[TecnicoController::class,'store'])->name('tecnico.guardar');
Route::patch('tecnico/actualizar/{tecnico}',[TecnicoController::class,'update'])->name('tecnico.update');
Route::delete('eliminar/tecnico/{tecnico_id}',[TecnicoController::class,'destroy'])->name('tecnico.destroy');

Route::get('marcas',[MarcaController::class,'index'])->name('marca.index');
Route::get('marca/create',[MarcaController::class,'create'])->name('marca.create');
Route::get('marca/edit/{marca}',[MarcaController::class,'edit'])->name('marca.edit');
Route::get('marca/show/{marca}',[MarcaController::class,'show'])->name('marca.show');
Route::post('marca/guardar',[MarcaController::class,'store'])->name('marca.guardar');
Route::patch('marca/actualizar/{marca}',[MarcaController::class,'update'])->name('marca.update');
Route::delete('eliminar/marca/{marca_id}',[MarcaController::class,'destroy'])->name('marca.destroy');

Route::get('tipoarticulos',[TipoarticuloController::class,'index'])->name('tipoarticulo.index');
Route::get('tipoarticulo/create',[TipoarticuloController::class,'create'])->name('tipoarticulo.create');
Route::get('tipoarticulo/edit/{tipoarticulo}',[TipoarticuloController::class,'edit'])->name('tipoarticulo.edit');
Route::get('tipoarticulo/show/{tipoarticulo}',[TipoarticuloController::class,'show'])->name('tipoarticulo.show');
Route::post('tipoarticulo/guardar',[TipoarticuloController::class,'store'])->name('tipoarticulo.guardar');
Route::patch('tipoarticulo/actualizar/{tipoarticulo}',[TipoarticuloController::class,'update'])->name('tipoarticulo.update');
Route::delete('eliminar/tipoarticulo/{tipoarticulo_id}',[TipoarticuloController::class,'destroy'])->name('tipoarticulo.destroy');

Route::get('evaluacions',[EvaluacionController::class,'index'])->name('evaluacion.index');
Route::get('evaluacion/create/{reparacion_id}',[EvaluacionController::class,'create'])->name('evaluacion.create');
Route::get('evaluacion/edit/{evaluacion}',[EvaluacionController::class,'edit'])->name('evaluacion.edit');
Route::get('evaluacion/show/{evaluacion}',[EvaluacionController::class,'show'])->name('evaluacion.show');
Route::post('evaluacion/guardar',[EvaluacionController::class,'store'])->name('evaluacion.guardar');
Route::patch('evaluacion/actualizar/{evaluacion}',[EvaluacionController::class,'update'])->name('evaluacion.update');
Route::delete('eliminar/evaluacion/{evaluacion_id}',[EvaluacionController::class,'destroy'])->name('evaluacion.destroy');

Route::get('articulos/{persona_id}',[ArticuloController::class,'index'])->name('articulo.index');
Route::get('articulo/create/{persona_id}',[ArticuloController::class,'create'])->name('articulo.create');
Route::get('articulo/edit/{articulo}',[ArticuloController::class,'edit'])->name('articulo.edit');
Route::get('articulo/alta/{reparacion_id}',[ArticuloController::class,'alta_para_reparar'])->name('articulo.alta');
Route::get('articulo/entregar/{reparacion_id}',[ArticuloController::class,'entregar'])->name('articulo.entregar');
Route::get('articulo/baja/{reparacion_id}',[ArticuloController::class,'baja'])->name('articulo.baja');

Route::get('articulo/show/{articulo}',[ArticuloController::class,'show'])->name('articulo.show');
Route::post('articulo/guardar',[ArticuloController::class,'store'])->name('articulo.guardar');
Route::patch('articulo/actualizar/{articulo}',[ArticuloController::class,'update'])->name('articulo.update');
Route::delete('eliminar/articulo/{articulo_id}',[ArticuloController::class,'destroy'])->name('articulo.destroy');
Route::get('articulo/listar',[ArticuloController::class,'listar'])->name('articulo.listar');

Route::get('reparacions/{tecnico_id}',[ReparacionController::class,'index'])->name('reparacion.index');
Route::get('reparacion/create/{cliente_id}/{articulo_id}',[ReparacionController::class,'create'])->name('reparacion.create');
Route::get('reparacion/edit/{reparacion}',[ReparacionController::class,'edit'])->name('reparacion.edit');
Route::get('reparacion/show/{reparacion}',[ReparacionController::class,'show'])->name('reparacion.show');
Route::post('reparacion/guardar',[ReparacionController::class,'store'])->name('reparacion.guardar');
Route::patch('reparacion/actualizar/{reparacion}',[ReparacionController::class,'update'])->name('reparacion.update');
Route::delete('eliminar/reparacion/{reparacion_id}',[ReparacionController::class,'destroy'])->name('reparacion.destroy');
Route::get('reparacion/listar',[ReparacionController::class,'listar'])->name('reparacion.listar');

Route::get('contactos/{persona_id}',[ContactoController::class,'index'])->name('contacto.index');
Route::get('contactos/listar',[ContactoController::class,'listar'])->name('contacto.listar');
Route::get('contacto/create/{persona_id}',[ContactoController::class,'create'])->name('contacto.create');
Route::get('contacto/edit/{contacto}',[ContactoController::class,'edit'])->name('contacto.edit');
Route::get('contacto/show/{contacto}',[ContactoController::class,'show'])->name('contacto.show');
Route::post('contacto/guardar',[ContactoController::class,'store'])->name('contacto.guardar');
Route::patch('contacto/actualizar/{contacto}',[ContactoController::class,'update'])->name('contacto.update');
Route::delete('eliminar/contacto/{contacto_id}',[ContactoController::class,'destroy'])->name('contacto.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
