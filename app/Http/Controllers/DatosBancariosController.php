<?php

namespace App\Http\Controllers;

use App\Models\DatosBancarios;
use Illuminate\Http\Request;

class DatosBancariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'banco' => 'required|string|max:255',
            'tipo_cuenta' => 'required|string|max:255',
            'numero_cuenta' => 'required|string|max:255',
            'cliente_id' => 'required|exists:clientes,id',
            'moneda' => 'required|string|max:10',
        ]);

        $DatosBancarios = DatosBancarios::create([
            'banco' => $request->get('banco'),
            'tipo_cuenta' => $request->get('tipo_cuenta'),
            'numero_cuenta' => $request->get('numero_cuenta'),
            'cliente_id' => $request->get('cliente_id'),
            'moneda' => $request->get('moneda')
        ]);

        if ($DatosBancarios) {
            return to_route('propietarios.show', $request->get('cliente_id'))->with('status', 1);
        } else {
            return to_route('propietarios.show', $request->get('cliente_id'))->with('status', 2);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DatosBancarios $datosBancarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatosBancarios $datosBancarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatosBancarios $datosBancarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatosBancarios $datosBancarios)
    {
        //
    }
}
