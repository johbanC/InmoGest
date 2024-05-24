<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        return("Index reparaciones");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reparacion $reparacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reparacion $reparacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reparacion $reparacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reparacion $reparacion)
    {
        //
    }
}
