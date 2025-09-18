<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquilinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $tipoInquilino = \App\Models\TipoCliente::where('acronimo', 'INQUI')->first();
        $clientes = [];
        if ($tipoInquilino) {
            $clientes = Cliente::with(['tipoDocumento', 'tipoEstatus']) // Agrega la relación tipoEstatus
                ->where('tipo_cliente_id', $tipoInquilino->id)

                ->get();
        }
        $tipodocumentos = \App\Models\TipoDocumento::select('id', 'nombre', 'acronimo')->get();
        $tipoestatus = \App\Models\TipoEstatus::select('id', 'nombre', 'acronimo')->get();
        $tipoclientes = \App\Models\TipoCliente::select('id', 'nombre', 'acronimo')->get();

        return view('inquilinos.index', compact('clientes', 'tipoInquilino', 'tipodocumentos', 'tipoestatus', 'tipoclientes'));
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
        try {
            $data = $request->validate([
                'tipo_documento_id' => 'required|exists:tipo_documentos,id',
                'numero_documento' => 'required|string|max:255',
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'telefono' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'direccion' => 'nullable|string|max:255',
            ]);

            $CrearInquilino = Cliente::create([
                'tipo_documento_id' => $data['tipo_documento_id'],
                'numero_documento' => $data['numero_documento'],
                'nombre' => ucwords(strtolower($data['nombre'])),
                'apellido' => ucwords(strtolower($data['apellido'])),
                'telefono' => $data['telefono'] ?? null,
                'email' => $data['email'] ?? null,
                'direccion' => $data['direccion'] ?? null,
                'tipo_cliente_id' => 2, // Por defecto 1 si no existe
                'tipo_estatus_id' => 1, // Estado activo
                'user_id' => auth()->id(),
            ]);

            if ($CrearInquilino) {
                return to_route('inquilinos.index')->with('status', 1);
            } else {
                return to_route('inquilinos.index')->with(['status' => 2, 'error' => 'No se pudo crear el inquilino.']);
            }
        } catch (\Exception $e) {
            // Puedes mostrar el error en la vista con @if(session('error')) ...
            return to_route('inquilinos.index')->with(['status' => 2, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inquilino = Cliente::with(['tipoDocumento', 'tipoEstatus', 'tipoCliente'])->findOrFail($id);
        return view('inquilinos.show', compact('inquilino'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {

        
        try {
            $data = $request->validate([
                'tipo_documento_id' => 'required|exists:tipo_documentos,id',
                'numero_documento' => 'required|string|max:255',
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'telefono' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'direccion' => 'nullable|string|max:255',
                'tipo_estatus_id' => 'required|exists:tipo_estatus,id', // Validación para el estatus
                'tipo_cliente_id' => 'required|exists:tipo_clientes,id', // Validación para el tipo de cliente
            ]);

            // Buscar el inquilino
            $inquilino = Cliente::findOrFail($id);

            $inquilino->update([
                'tipo_documento_id' => $data['tipo_documento_id'],
                'numero_documento' => $data['numero_documento'],
                'nombre' => ucwords(strtolower($data['nombre'])),
                'apellido' => ucwords(strtolower($data['apellido'])),
                'telefono' => $data['telefono'] ?? null,
                'email' => $data['email'] ?? null,
                'direccion' => $data['direccion'] ?? null,
                'tipo_cliente_id' => $data['tipo_cliente_id'], // Por defecto 1 si no existe
                'tipo_estatus_id' => $data['tipo_estatus_id'], // Estado activo

            ]);

            return to_route('inquilinos.index')->with('status', 3);
        } catch (\Exception $e) {
            return to_route('inquilinos.index')->with(['status' => 4, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $inquilino = Cliente::findOrFail($id);
        
        $inquilino->update(['tipo_estatus_id' => 2]); // Cambia 2 por el ID correspondiente al estatus "Inactivo" en tu base de datos   

        if ($inquilino) {
            return to_route('inquilinos.index')->with('status', 5);
        } else {
            return to_route('inquilinos.index')->with(['status' => 6, 'error' => 'No se pudo eliminar el inquilino.']);
        }
    }
}
