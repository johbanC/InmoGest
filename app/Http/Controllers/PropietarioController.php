<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $tipoPropietario = \App\Models\TipoCliente::where('acronimo', 'PRO')->first();
        $clientes = [];
        if ($tipoPropietario) {
            $clientes = Cliente::with(['tipoDocumento', 'tipoEstatus']) // Agrega la relación tipoEstatus
                ->where('tipo_cliente_id', $tipoPropietario->id)

                ->get();
        }
        $tipodocumentos = \App\Models\TipoDocumento::select('id', 'nombre', 'acronimo')->get();
        $tipoestatus = \App\Models\TipoEstatus::select('id', 'nombre', 'acronimo')->get();
        $tipoclientes = \App\Models\TipoCliente::select('id', 'nombre', 'acronimo')->get();

        return view('propietarios.index', compact('clientes', 'tipoPropietario', 'tipodocumentos', 'tipoestatus', 'tipoclientes'));
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

            $CrearPropietario = Cliente::create([
                'tipo_documento_id' => $data['tipo_documento_id'],
                'numero_documento' => $data['numero_documento'],
                'nombre' => ucwords(strtolower($data['nombre'])),
                'apellido' => ucwords(strtolower($data['apellido'])),
                'telefono' => $data['telefono'] ?? null,
                'email' => $data['email'] ?? null,
                'direccion' => $data['direccion'] ?? null,
                'tipo_cliente_id' => 1, // Por defecto 1 si no existe
                'tipo_estatus_id' => 1, // Estado activo
                'user_id' => auth()->id(),
            ]);

            if ($CrearPropietario) {
                return to_route('propietarios.index')->with('status', 1);
            } else {
                return to_route('propietarios.index')->with(['status' => 2, 'error' => 'No se pudo crear el propietario.']);
            }
        } catch (\Exception $e) {
            // Puedes mostrar el error en la vista con @if(session('error')) ...
            return to_route('propietarios.index')->with(['status' => 2, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
{
    $propietario = \App\Models\Cliente::with(['tipoDocumento', 'tipoEstatus', 'tipoCliente'])
        ->findOrFail($id);

    // Obtener solo el último dato bancario registrado
    $ultimoDatoBancario = \App\Models\DatosBancarios::where('cliente_id', $id)
        ->latest('created_at')
        ->first();

    // Obtener todos los datos bancarios registrados
    $datosBancarios = \App\Models\DatosBancarios::where('cliente_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('propietarios.show', compact('propietario', 'ultimoDatoBancario', 'datosBancarios'));
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

            // Buscar el propietario
            $propietario = Cliente::findOrFail($id);

            $propietario->update([
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

            return to_route('propietarios.index')->with('status', 3);
        } catch (\Exception $e) {
            return to_route('propietarios.index')->with(['status' => 4, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        
        $propietario = Cliente::findOrFail($id);
        
        $propietario->update(['tipo_estatus_id' => 2]); // Cambia 2 por el ID correspondiente al estatus "Inactivo" en tu base de datos   

        if ($propietario) {
            return to_route('propietarios.index')->with('status', 5);
        } else {
            return to_route('propietarios.index')->with(['status' => 6, 'error' => 'No se pudo eliminar el propietario.']);
        }
    }
}
