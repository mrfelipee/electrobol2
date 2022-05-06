<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Tipocontacto;
use App\Models\Persona;
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
    public function index($persona_id)
    {
        $miscontactos=Contacto::join('tipocontactos','tipocontactos.id','contactos.tipocontacto_id')
                        ->where('persona_id',$persona_id)
                        ->select('contactos.id','contactos.contacto','contactos.detalle','tipocontactos.tipo')
                        ->get();
        //dd($miscontactos);
        $persona=Persona::findOrFail($persona_id);
        return view('contacto.listar',compact('persona_id','persona','miscontactos'));

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
    public function create($persona_id)
    {
        $tipocontactos=Tipocontacto::get();
        return view('contacto.crear',compact('tipocontactos','persona_id'));
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
        $contacto->tipocontacto_id=$request->tipocontacto_id;
        $contacto->persona_id=$request->persona_id;
        $contacto->save();

        return redirect()->route('contacto.index',$contacto->persona_id);
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
        $tipocontactos=Tipocontacto::get();
        $persona_id=$contacto->persona_id;
        return view('contacto.editar',compact('contacto','tipocontactos','persona_id'));
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
        $contacto->contacto=$request->contacto;
        $contacto->detalle=$request->detalle;
        $contacto->tipocontacto_id=$request->tipocontacto_id;
        //$contacto->persona_id=$request->persona_id;
        $contacto->save();

        return redirect()->route('contacto.index',$contacto->persona_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($contacto)
    {
        // dd($contacto);
        $contacto=Contacto::findOrFail($contacto);
        $persona_id=$contacto->persona_id;
        $contacto->delete();
        //return redirect()->route('contacto.index',$persona_id);
    }
}
