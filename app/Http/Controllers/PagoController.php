<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Tipopago;
use App\Models\Reparacion;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class PagoController extends Controller
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
        $tipopagos=Tipopago::get();
        // dd($tipopagos);
        $acuenta=$reparacion->pagos->sum('monto');
        return view('pago.crear',compact('reparacion','tipopagos','acuenta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePagoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePagoRequest $request)
    {
        $pago=new Pago();
        $pago->monto=$request->monto;
        $pago->descripcion=$request->descripcion;
        $pago->tipopago_id=$request->tipopago_id;
        $pago->reparacion_id=$request->reparacion_id;
        $pago->save();
        $reparacion=Reparacion::findOrFail($request->reparacion_id);
        $tecnico=$reparacion->tecnico;
        // return redirect()->route('reparacion.index',$tecnico->id);

        $pagos=$reparacion->pagos;
        $acuenta=$reparacion->pagos->sum('monto');
        $persona=$reparacion->cliente->persona;
        $pdf = PDF::loadView('pago.reporte',compact('reparacion','acuenta','persona','tecnico','pagos'));
        return $pdf->download('reporte.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePagoRequest  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
