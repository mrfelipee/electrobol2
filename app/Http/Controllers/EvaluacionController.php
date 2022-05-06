<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Reparacion;
use App\Models\Tipopago;
use App\Http\Requests\StoreEvaluacionRequest;
use App\Http\Requests\UpdateEvaluacionRequest;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reparacion_id)
    {
        $reparacion=Reparacion::findOrFail($reparacion_id);
        return view('evaluacion.crear',compact('reparacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvaluacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvaluacionRequest $request)
    {
        $evaluacion=new Evaluacion();
        $evaluacion->evaluacion=$request->evaluacion;
        $evaluacion->reparacion_id=$request->reparacion_id;
        $evaluacion->save();
        
        $reparacion=Reparacion::findOrFail($request->reparacion_id);
        $tipopagos=Tipopago::get();
        $acuenta=$reparacion->pagos->sum('monto');
        return view('pago.crear',compact('reparacion','tipopagos','acuenta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluacionRequest  $request
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEvaluacionRequest $request, Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        //
    }
}
