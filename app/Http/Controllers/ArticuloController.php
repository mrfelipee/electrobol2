<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Marca;
use App\Models\Tipoarticulo;
use App\Models\Tipopago;
use App\Models\Cliente;
use App\Models\Reparacion;
use App\Models\Persona;
use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Http\Requests\GeneralRequest;

class ArticuloController extends Controller
{
  
    public function index($persona_id)
    {
        $cliente=Persona::findOrFail($persona_id)->cliente;
        return view('articulo.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($persona_id)
    {
        $marcas=Marca::get();
        $tipoarticulos=Tipoarticulo::get();
        $cliente=Persona::findOrFail($persona_id)->cliente;
        
        return view('articulo.crear',compact('marcas','tipoarticulos','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticuloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticuloRequest $request)
    {
        $articulo=new Articulo();
        $articulo->serie=$request->serie;
        $articulo->fecha=$request->fecha;
        $articulo->estado='EVALUACION';
        $articulo->marca_id=$request->marca_id;
        $articulo->cliente_id=$request->cliente_id;
        $articulo->tipoarticulo_id=$request->tipoarticulo_id;
        $articulo->save();

        $cliente=Cliente::findOrFail($request->cliente_id);
        return view('articulo.index',compact('cliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $marcas=Marca::get();
        $tipoarticulos=Tipoarticulo::get();
        $cliente=$articulo->cliente;
        //dd($cliente);
        return view('articulo.editar',compact('articulo','marcas','tipoarticulos','cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticuloRequest  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $articulo->serie=$request->serie;
        $articulo->fecha=$request->fecha;
        $articulo->marca_id=$request->marca_id;
        $articulo->tipoarticulo_id=$request->tipoarticulo_id;
        $articulo->save();
        $persona=$articulo->cliente->persona;
        return redirect()->route('articulo.index',$persona->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($articulo_id)
    {
         Articulo::findOrFail($articulo_id)->delete();
        return response()->json(['respuesta'=>'El registro fue eliminado correctamente'], 200);
    }

    public function listar(GeneralRequest $request){
        // return response()->json(['r'=>$request->all()]);
        // $cliente_id=1;
        $articulos=Articulo::join('marcas','marcas.id','articulos.marca_id')
                ->join('tipoarticulos','tipoarticulos.id','articulos.tipoarticulo_id')
                ->where('articulos.cliente_id',$request->cliente_id)
                ->select('articulos.id','serie','articulos.cliente_id','fecha','marcas.marca','tipoarticulos.tipoarticulo','estado')->get();

        return datatables()->of($articulos)
            ->addColumn('btn', 'articulo.action')
            ->rawColumns(['btn'])
            ->toJson();
    }
    public function alta_para_reparar($reparacion_id){
        $reparacion=Reparacion::findOrFail($reparacion_id);
        $articulo = $reparacion->articulo;
        $articulo->estado="REPARACION";
        $articulo->save();
        return redirect()->route('reparacion.edit',$reparacion);
    }
    public function entregar($reparacion_id){
        $reparacion=Reparacion::findOrFail($reparacion_id);
        $articulo = $reparacion->articulo;
        $articulo->estado="ENTREGADO";
        $articulo->save();
        return redirect()->route('persona.index');
    }
    public function baja($reparacion_id){
        $reparacion=Reparacion::findOrFail($reparacion_id);
        $reparacion->costo=100;
        $articulo = $reparacion->articulo;

        $articulo->estado="ENTREGADO";
        $articulo->save();

        $tipopagos=Tipopago::get();
        $acuenta=$reparacion->pagos->sum('monto');
        return view('pago.crear',compact('reparacion','tipopagos','acuenta'));

    }
}
