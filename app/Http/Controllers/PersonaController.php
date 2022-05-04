<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Tecnico;
use App\Models\Cliente;
use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Models\Tipocontacto;

use function Ramsey\Uuid\v1;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('persona.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persona.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonaRequest $request)
    {
        $persona= new Persona();
        $persona->nombre=$request->nombre;
        $persona->apellidos=$request->apellidos;
        $persona->direccion=$request->direccion;
        $persona->carnet=$request->carnet;
        $persona->save();

    
        if( $request->rol=='tecnico'){
            $tecnico=new Tecnico();
            $tecnico->persona_id=$persona->id;
            $tecnico->save();
             
        }
        if( $request->rol=='cliente'){
            $cliente=new Cliente();
            $cliente->persona_id=$persona->id;
            $cliente->save();
            return redirect()->route('persona.index');
        }

        $tipocontactos=Tipocontacto::get();
        return view('contacto.crear',compact('persona','tipocontactos'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        // dd($persona);
        return view('persona.mostrar',compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //$roles=[""];
        return view('persona.editar',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonaRequest  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        $persona->nombre=$request->nombre;
        $persona->apellidos=$request->apellidos;
        $persona->direccion=$request->direccion;
        $persona->carnet=$request->carnet;
        $persona->save();

        if (isset($persona->cliente)){
            if( $request->rol=='tecnico'){
                $persona->cliente->delete();
                $tecnico=new Tecnico();
                $tecnico->persona_id=$persona->id;
                $tecnico->save();
            }
        }

        if (isset($persona->tecnico)){
            if( $request->rol=='cliente'){
                $persona->tecnico->delete();
                $cliente=new Cliente();
                $cliente->persona_id=$persona->id;
                $cliente->save();
            }
        }
       

        return redirect()->route('persona.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona_id)
    {
        //$persona_id=1;
        Persona::findOrFail($persona_id)->delete();
        return response()->json(['respuesta'=>"Se elimino correctamente"], 200);
    }
}
