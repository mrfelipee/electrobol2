<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Http\Requests\StoreContactoRequest;
use App\Http\Requests\UpdateContactoRequest;
use App\Http\Requests\RequestContacto;


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($persona_id);
        $p=3;
        $miscontactos=Contacto::where('persona_id',$p);
        dd($p);
        return view('contacto.listar',compact('p','miscontactos'));

    }

   
    public function listarx()
    {
        $persona_id=3;
        //return response()->json(['a'=>1]);
        $miscontactos=Contacto::where('persona_id','=',$persona_id);
        return datatables()->of($miscontactos)
                // ->addColumn('btn', 'contacto.action')
                // ->rawColumns(['btn'])
                ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacto.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactoRequest $request)
    {
        //dd($request->all());
        $contacto= new Contacto();
        $contacto->contacto=$request->contacto;
        $contacto->detalle=$request->detalle;
        $contacto->tipocontactos_id=$request->tipocontacto_id;
        $contacto->persona_id=$request->persona_id;
        $contacto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactoRequest  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactoRequest $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
