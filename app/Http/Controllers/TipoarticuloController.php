<?php

namespace App\Http\Controllers;

use App\Models\tipoarticulo;
use App\Http\Requests\StoretipoarticuloRequest;
use App\Http\Requests\UpdatetipoarticuloRequest;

class TipoarticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipoarticulo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoarticulo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretipoarticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretipoarticuloRequest $request)
    {
        $tipoarticulo=new Tipoarticulo();
        $tipoarticulo->tipoarticulo=$request->tipoarticulo;
        $tipoarticulo->save();

        return redirect()->route('tipoarticulo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipoarticulo  $tipoarticulo
     * @return \Illuminate\Http\Response
     */
    public function show(tipoarticulo $tipoarticulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipoarticulo  $tipoarticulo
     * @return \Illuminate\Http\Response
     */
    public function edit(tipoarticulo $tipoarticulo)
    {
        return view('tipoarticulo.editar',compact('tipoarticulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetipoarticuloRequest  $request
     * @param  \App\Models\tipoarticulo  $tipoarticulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetipoarticuloRequest $request, tipoarticulo $tipoarticulo)
    {
        $tipoarticulo->tipoarticulo=$request->tipoarticulo;
        $tipoarticulo->save();

        return redirect()->route('tipoarticulo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipoarticulo  $tipoarticulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipoarticulo_id)
    {
        Tipoarticulo::findOrFail($tipoarticulo_id)->delete();
        return response()->json(['respuesta'=>'El registro fue eliminado correctamente'], 200);
    }
}
