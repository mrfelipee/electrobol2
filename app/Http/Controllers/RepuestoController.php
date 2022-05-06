<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use App\Http\Requests\StoreRepuestoRequest;
use App\Http\Requests\UpdateRepuestoRequest;

class RepuestoController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepuestoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepuestoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Repuesto $repuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepuestoRequest  $request
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepuestoRequest $request, Repuesto $repuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repuesto $repuesto)
    {
        //
    }
}
