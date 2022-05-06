<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Persona;
use App\Models\Tipoarticulo;
use App\Models\Marca;
use App\Models\Articulo;
use App\Models\Tecnico;
use App\Models\Reparacion;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('personas', function () {
    $clientes=Persona::join('clientes','clientes.persona_id','personas.id')
                ->select('personas.id','nombre','apellidos','direccion','carnet')
                ->get();

    return datatables()->of($clientes)
        ->addColumn('btn', 'persona.action')
        ->rawColumns(['btn'])
        ->toJson();
});
Route::get('tecnicos', function () {
    $tecnicos=Persona::join('tecnicos','tecnicos.persona_id','personas.id')
                ->select('personas.id','nombre','apellidos','direccion','carnet')
                ->get();

    return datatables()->of($tecnicos)
        ->addColumn('btn', 'tecnico.action')
        ->rawColumns(['btn'])
        ->toJson();
});
Route::get('marcas', function () {
    return datatables()->of(Marca::get())
        ->addColumn('btn', 'marca.action')
        ->rawColumns(['btn'])
        ->toJson();
});
Route::get('tipoarticulos', function () {
    return datatables()->of(Tipoarticulo::get())
        ->addColumn('btn', 'tipoarticulo.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('reparaciones', function () {
    $reparaciones=Reparacion::join('tecnicos','tecnicos.id','reparacions.tecnico_id')
            ->join('personas','personas.id','tecnicos.persona_id')
            ->join('clientes','clientes.id','reparacions.cliente_id')
            ->join('articulos','articulos.id','reparacions.articulo_id')
            ->join('tipoarticulos','articulos.tipoarticulo_id','tipoarticulos.id')
            ->select('reparacions.id','personas.nombre','clientes.id as cliente','tipoarticulos.tipoarticulo','reparacions.problema')
            ->where('activo',true)->get();
    return datatables()->of($reparaciones)
        ->addColumn('btn', 'reparacion.action')
        ->rawColumns(['btn'])
        ->toJson();
});
