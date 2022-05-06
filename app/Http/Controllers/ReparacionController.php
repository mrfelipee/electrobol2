<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use App\Models\Tecnico;
use App\Models\Tipopago;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Persona;
use App\Http\Requests\StoreReparacionRequest;
use App\Http\Requests\UpdateReparacionRequest;
use App\Http\Requests\GeneralRequest;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tecnico_id)
    {
        $tecnico=Persona::findOrFail($tecnico_id)->tecnico;
        // dd($tecnico);
        return view('reparacion.index',compact('tecnico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente_id,$articulo_id)
    {
        
        $tecnicos=Tecnico::join('personas','personas.id','tecnicos.persona_id')
            ->select('tecnicos.id','nombre','apellidos')    
            ->get();
        $articulo=Articulo::findOrFail($articulo_id);
        $cliente=Cliente::findOrFail($cliente_id);

        return view('reparacion.crear',compact('tecnicos','articulo','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReparacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReparacionRequest $request)
    {
        //dd($request->all());
        $reparacion=new Reparacion();
        $reparacion->costo=$request->costo;
        $reparacion->tecnico_id=$request->tecnico_id;
        $reparacion->cliente_id=$request->cliente_id;
        $reparacion->articulo_id=$request->articulo_id;
        $reparacion->problema=$request->problema;
        $reparacion->save();

        return redirect()->route('evaluacion.create',$reparacion->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function show(Reparacion $reparacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reparacion $reparacion)
    {
        $tecnicos=Tecnico::join('personas','personas.id','tecnicos.persona_id')
            ->select('tecnicos.id','nombre','apellidos')    
            ->get();
       

        return view('reparacion.editar',compact('reparacion','tecnicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReparacionRequest  $request
     * @param  \App\Models\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReparacionRequest $request, Reparacion $reparacion)
    {
        $reparacion->costo=$request->costo;
        $reparacion->tecnico_id=$request->tecnico_id;
        $reparacion->problema=$request->problema;
        $reparacion->save();
        
        $tipopagos=Tipopago::get();
        $acuenta=$reparacion->pagos->sum('monto');
        
        return view('pago.crear',compact('reparacion','tipopagos','acuenta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reparacion  $reparacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reparacion $reparacion)
    {
        //
    }

    public function listar(GeneralRequest $request){
        // return response()->json($request->all());
        $reparaciones=Reparacion::join('clientes','clientes.id','reparacions.cliente_id')
                ->join('personas','personas.id','clientes.persona_id')
                ->join('articulos','articulos.id','reparacions.articulo_id')
                ->join('tipoarticulos','articulos.tipoarticulo_id','tipoarticulos.id')
                ->where('tecnico_id',$request->tecnico_id)
                ->select('reparacions.id','personas.nombre','apellidos','reparacions.cliente_id','articulos.estado','tipoarticulos.tipoarticulo','problema')->get();
        return datatables()->of($reparaciones)
            ->addColumn('btn', 'reparacion.action')
            ->rawColumns(['btn','problema'])
            ->toJson();
    } 
}
