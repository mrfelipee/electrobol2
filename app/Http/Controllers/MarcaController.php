<?php

namespace App\Http\Controllers;

use App\Models\marca;
use App\Http\Requests\StoremarcaRequest;
use App\Http\Requests\UpdatemarcaRequest;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marca.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremarcaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremarcaRequest $request)
    {
        $marca=new Marca();
        $marca->marca=$request->marca;
        $marca->save();

        return redirect()->route('marca.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(marca $marca)
    {
        return view('marca.editar',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemarcaRequest  $request
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemarcaRequest $request, marca $marca)
    {
        $marca->marca=$request->marca;
        $marca->save();

        return redirect()->route('marca.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($marca_id)
    {
        Marca::findOrFail($marca_id)->delete();
        return response()->json(['respuesta'=>'El registro fue eliminado correctamente'], 200);
    }
}
