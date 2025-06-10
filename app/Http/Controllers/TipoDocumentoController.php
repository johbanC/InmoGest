<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $tipodocumentos = TipoDocumento::with(['tipoEstatus', 'user'])->get();
        return view('tipodocumentos.index', compact('tipodocumentos'));
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
            'nombre' => 'required'
        ]);


        $tipodocumento = TipoDocumento::create([
            'nombre' => ucwords(strtolower($request->get('nombre'))),
            'acronimo' => strtoupper($request->get('acronimo')),
            'descripcion' => $request->get('descripcion'),
            'tipo_estatus_id' => '1', //Estatus ACTIVO siempre que se cree un nuevo tipo de documento
            'user_id' => auth()->id(),
        ]);

        if ($tipodocumento) {
            return to_route('tipodocumentos.index')->with('status', 1);
        } else {
            return to_route('tipodocumentos.index')->with('status', 2);
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoDocumento $tipoDocumento)
    {
        return view('tipodocumentos.edit', [
            'tipoDocumento' => $tipoDocumento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, tipodocumento $tipodocumento)
    {
        $actualizado = $tipodocumento->update([
            'nombre' => ucwords(strtolower($request->get('nombre'))),
            'acronimo' => strtoupper($request->get('acronimo')),
            'descripcion' => $request->get('descripcion'),
        ]);

        if ($actualizado) {
            return to_route('tipodocumentos.index')->with('status', 3);
        } else {
            return to_route('tipodocumentos.index')->with('status', 4);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipodocumento $tipodocumento)
    {
        $eliminado = $tipodocumento->delete();

        if ($eliminado) {
            return to_route('tipodocumentos.index')->with('status', 5);
        } else {
            return to_route('tipodocumentos.index')->with('status', 6);
        }
    }
}
