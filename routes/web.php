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
use App\Http\Controllers\RepuestoController;


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


Route::get('personas',[PersonaController::class,'index'])->name('persona.index')->middleware('auth');
Route::get('persona/create',[PersonaController::class,'create'])->name('persona.create')->middleware('auth');
Route::get('persona/edit/{persona}',[PersonaController::class,'edit'])->name('persona.edit')->middleware('auth');
Route::get('persona/show/{persona}',[PersonaController::class,'show'])->name('persona.show')->middleware('auth');
Route::post('persona/guardar',[PersonaController::class,'store'])->name('persona.guardar')->middleware('auth');
Route::patch('persona/actualizar/{persona}',[PersonaController::class,'update'])->name('persona.update')->middleware('auth');
Route::delete('eliminar/persona/{persona_id}',[PersonaController::class,'destroy'])->name('persona.destroy')->middleware('auth');


Route::get('repuestos',[RepuestoController::class,'index'])->name('repuesto.index')->middleware('auth');
Route::get('repuesto/create',[RepuestoController::class,'create'])->name('repuesto.create')->middleware('auth');
Route::get('repuesto/edit/{repuesto}',[RepuestoController::class,'edit'])->name('repuesto.edit')->middleware('auth');
Route::get('repuesto/show/{repuesto}',[RepuestoController::class,'show'])->name('repuesto.show')->middleware('auth');
Route::post('repuesto/guardar',[RepuestoController::class,'store'])->name('repuesto.guardar')->middleware('auth');
Route::patch('repuesto/actualizar/{repuesto}',[RepuestoController::class,'update'])->name('repuesto.update')->middleware('auth');
Route::delete('eliminar/repuesto/{repuesto_id}',[RepuestoController::class,'destroy'])->name('repuesto.destroy')->middleware('auth');

Route::get('pagos',[PagoController::class,'index'])->name('pago.index')->middleware('auth');
Route::get('pago/create/{reparacion_id}',[PagoController::class,'create'])->name('pago.create')->middleware('auth');
Route::get('pago/edit/{pago}',[PagoController::class,'edit'])->name('pago.edit')->middleware('auth');
Route::get('pago/show/{pago}',[PagoController::class,'show'])->name('pago.show')->middleware('auth');
Route::post('pago/guardar',[PagoController::class,'store'])->name('pago.guardar')->middleware('auth');
Route::patch('pago/actualizar/{pago}',[PagoController::class,'update'])->name('pago.update')->middleware('auth');
Route::delete('eliminar/pago/{pago_id}',[PagoController::class,'destroy'])->name('pago.destroy')->middleware('auth');

Route::get('tecnicos',[TecnicoController::class,'index'])->name('tecnico.index')->middleware('auth');
Route::get('tecnico/create',[TecnicoController::class,'create'])->name('tecnico.create')->middleware('auth');
Route::get('tecnico/edit/{tecnico}',[TecnicoController::class,'edit'])->name('tecnico.edit')->middleware('auth');
Route::get('tecnico/show/{tecnico}',[TecnicoController::class,'show'])->name('tecnico.show')->middleware('auth');
Route::post('tecnico/guardar',[TecnicoController::class,'store'])->name('tecnico.guardar')->middleware('auth');
Route::patch('tecnico/actualizar/{tecnico}',[TecnicoController::class,'update'])->name('tecnico.update')->middleware('auth');
Route::delete('eliminar/tecnico/{tecnico_id}',[TecnicoController::class,'destroy'])->name('tecnico.destroy')->middleware('auth');

Route::get('marcas',[MarcaController::class,'index'])->name('marca.index')->middleware('auth');
Route::get('marca/create',[MarcaController::class,'create'])->name('marca.create')->middleware('auth');
Route::get('marca/edit/{marca}',[MarcaController::class,'edit'])->name('marca.edit')->middleware('auth');
Route::get('marca/show/{marca}',[MarcaController::class,'show'])->name('marca.show')->middleware('auth');
Route::post('marca/guardar',[MarcaController::class,'store'])->name('marca.guardar')->middleware('auth');
Route::patch('marca/actualizar/{marca}',[MarcaController::class,'update'])->name('marca.update')->middleware('auth');
Route::delete('eliminar/marca/{marca_id}',[MarcaController::class,'destroy'])->name('marca.destroy')->middleware('auth');

Route::get('tipoarticulos',[TipoarticuloController::class,'index'])->name('tipoarticulo.index')->middleware('auth');
Route::get('tipoarticulo/create',[TipoarticuloController::class,'create'])->name('tipoarticulo.create')->middleware('auth');
Route::get('tipoarticulo/edit/{tipoarticulo}',[TipoarticuloController::class,'edit'])->name('tipoarticulo.edit')->middleware('auth');
Route::get('tipoarticulo/show/{tipoarticulo}',[TipoarticuloController::class,'show'])->name('tipoarticulo.show')->middleware('auth');
Route::post('tipoarticulo/guardar',[TipoarticuloController::class,'store'])->name('tipoarticulo.guardar')->middleware('auth');
Route::patch('tipoarticulo/actualizar/{tipoarticulo}',[TipoarticuloController::class,'update'])->name('tipoarticulo.update')->middleware('auth');
Route::delete('eliminar/tipoarticulo/{tipoarticulo_id}',[TipoarticuloController::class,'destroy'])->name('tipoarticulo.destroy')->middleware('auth');

Route::get('evaluacions',[EvaluacionController::class,'index'])->name('evaluacion.index')->middleware('auth');
Route::get('evaluacion/create/{reparacion_id}',[EvaluacionController::class,'create'])->name('evaluacion.create')->middleware('auth');
Route::get('evaluacion/edit/{evaluacion}',[EvaluacionController::class,'edit'])->name('evaluacion.edit')->middleware('auth');
Route::get('evaluacion/show/{evaluacion}',[EvaluacionController::class,'show'])->name('evaluacion.show')->middleware('auth');
Route::post('evaluacion/guardar',[EvaluacionController::class,'store'])->name('evaluacion.guardar')->middleware('auth');
Route::patch('evaluacion/actualizar/{evaluacion}',[EvaluacionController::class,'update'])->name('evaluacion.update')->middleware('auth');
Route::delete('eliminar/evaluacion/{evaluacion_id}',[EvaluacionController::class,'destroy'])->name('evaluacion.destroy')->middleware('auth');

Route::get('articulos/{persona_id}',[ArticuloController::class,'index'])->name('articulo.index')->middleware('auth');
Route::get('articulo/create/{persona_id}',[ArticuloController::class,'create'])->name('articulo.create')->middleware('auth');
Route::get('articulo/edit/{articulo}',[ArticuloController::class,'edit'])->name('articulo.edit')->middleware('auth');
Route::get('articulo/alta/{reparacion_id}',[ArticuloController::class,'alta_para_reparar'])->name('articulo.alta')->middleware('auth');
Route::get('articulo/entregar/{reparacion_id}',[ArticuloController::class,'entregar'])->name('articulo.entregar')->middleware('auth');
Route::get('articulo/baja/{reparacion_id}',[ArticuloController::class,'baja'])->name('articulo.baja')->middleware('auth');

Route::get('articulo/show/{articulo}',[ArticuloController::class,'show'])->name('articulo.show')->middleware('auth');
Route::post('articulo/guardar',[ArticuloController::class,'store'])->name('articulo.guardar')->middleware('auth');
Route::patch('articulo/actualizar/{articulo}',[ArticuloController::class,'update'])->name('articulo.update')->middleware('auth');
Route::delete('eliminar/articulo/{articulo_id}',[ArticuloController::class,'destroy'])->name('articulo.destroy')->middleware('auth');
Route::get('articulo/listar',[ArticuloController::class,'listar'])->name('articulo.listar')->middleware('auth');

Route::get('reparacions/{tecnico_id}',[ReparacionController::class,'index'])->name('reparacion.index')->middleware('auth');
Route::get('reparacion/create/{cliente_id}/{articulo_id}',[ReparacionController::class,'create'])->name('reparacion.create')->middleware('auth');
Route::get('reparacion/edit/{reparacion}',[ReparacionController::class,'edit'])->name('reparacion.edit')->middleware('auth');
Route::get('reparacion/show/{reparacion}',[ReparacionController::class,'show'])->name('reparacion.show')->middleware('auth');
Route::post('reparacion/guardar',[ReparacionController::class,'store'])->name('reparacion.guardar')->middleware('auth');
Route::patch('reparacion/actualizar/{reparacion}',[ReparacionController::class,'update'])->name('reparacion.update')->middleware('auth');
Route::delete('eliminar/reparacion/{reparacion_id}',[ReparacionController::class,'destroy'])->name('reparacion.destroy')->middleware('auth');
Route::get('reparacion/listar',[ReparacionController::class,'listar'])->name('reparacion.listar')->middleware('auth');

Route::get('contactos/{persona_id}',[ContactoController::class,'index'])->name('contacto.index')->middleware('auth');
Route::get('contactos/listar',[ContactoController::class,'listar'])->name('contacto.listar')->middleware('auth');
Route::get('contacto/create/{persona_id}',[ContactoController::class,'create'])->name('contacto.create')->middleware('auth');
Route::get('contacto/edit/{contacto}',[ContactoController::class,'edit'])->name('contacto.edit')->middleware('auth');
Route::get('contacto/show/{contacto}',[ContactoController::class,'show'])->name('contacto.show')->middleware('auth');
Route::post('contacto/guardar',[ContactoController::class,'store'])->name('contacto.guardar')->middleware('auth');
Route::patch('contacto/actualizar/{contacto}',[ContactoController::class,'update'])->name('contacto.update')->middleware('auth');
Route::delete('eliminar/contacto/{contacto_id}',[ContactoController::class,'destroy'])->name('contacto.destroy')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
