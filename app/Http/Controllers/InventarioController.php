<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('inventarios.index');
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

        $request->validate([
            'fecha' => 'required',
            'direccion' => ['required', 'min:3'],
            'tipo_inmueble' => 'required',
            'arrendador' => ['required', 'min:3'],
            'inquilino' => ['required', 'min:3'],
            'propietario' => ['required', 'min:3'],
            'nro_llaves' => ['required', 'min:1']
        ]);

        Inventario::create([
            'direccion' => $request->get('direccion'),
            'tipo_inmueble' => $request->get('tipo_inmueble'),
            'arrendador' => $request->get('arrendador'),
            'inquilino' => $request->get('inquilino'),
            'propietario' => $request->get('propietario'),
            'nro_llaves' => $request->get('nro_llaves'),
            'user_id' => auth()->id(),
        ]);

        //Con esta nueva opcion se va enviar el status con las diferentes opciones para poder visualizar las diferentes notificaciones.
        return to_route('inventarios.index')->with('status', [
            'type' => 'success',
            'message' => 'Guardado con éxito',
            'title' => 'Registro'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
