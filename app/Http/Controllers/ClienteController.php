<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($tipo)
    {
        $tipoCliente = \App\Models\TipoCliente::where('acronimo', strtoupper($tipo))->firstOrFail();
        $clientes = Cliente::with('tipoDocumento')
            ->where('tipo_cliente_id', $tipoCliente->id)
            ->get();

        return view("clientes.index", compact('clientes', 'tipoCliente'));
    }


    public function propietarios()
    {
        $tipoPropietario = \App\Models\TipoCliente::where('acronimo', 'PRO')->first();
        $clientes = [];
        if ($tipoPropietario) {
            $clientes = Cliente::with('tipoDocumento')
                ->where('tipo_cliente_id', $tipoPropietario->id)
                ->get();
        }
        $tipodocumentos = \App\Models\TipoDocumento::select('id', 'nombre', 'acronimo')->get();

        return view('propietarios.index', compact('clientes', 'tipoPropietario', 'tipodocumentos'));
    }

    public function createPropietario()
    {

        $tipodocumentos = \App\Models\TipoDocumento::select('id', 'nombre', 'acronimo')->get();

        return view('propietarios.create', compact('tipodocumentos'));
    }

    public function storePropietario(Request $request)
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
                'estatus_id' => 1, // Estado activo
                'user_id' => auth()->id(),
            ]);

            if ($CrearPropietario) {
                return to_route('clientes.propietarios')->with('status', 1);
            } else {
                return to_route('clientes.propietarios')->with(['status' => 2, 'error' => 'No se pudo crear el propietario.']);
            }
        } catch (\Exception $e) {
            // Puedes mostrar el error en la vista con @if(session('error')) ...
            return to_route('clientes.propietarios')->with(['status' => 2, 'error' => $e->getMessage()]);
        }
    }


    public function showPropietario($id)
    {
        $cliente = Cliente::with('tipoDocumento')->findOrFail($id);
        return view('propietarios.show', compact('cliente'));
    }


    //Inquilinos

    public function inquilinos()
    {
        $tipoInquilino = \App\Models\TipoCliente::where('acronimo', 'INQUI')->first();
        $clientes = [];
        if ($tipoInquilino) {
            $clientes = Cliente::with('tipoDocumento')
                ->where('tipo_cliente_id', $tipoInquilino->id)
                ->get();
        }
        $tipodocumentos = \App\Models\TipoDocumento::select('id', 'nombre', 'acronimo')->get();

        return view('inquilinos.index', compact('clientes', 'tipoInquilino', 'tipodocumentos'));
    }

    public function createInquilino()
    {

        $tipodocumentos = \App\Models\TipoDocumento::select('id', 'nombre', 'acronimo')->get();

        return view('inquilinos.create', compact('tipodocumentos'));
    }

    public function storeInquilino(Request $request)
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
                'tipo_cliente_id' => 1, // Por defecto 1 si no existe
                'estatus_id' => 1, // Estado activo
                'user_id' => auth()->id(),
            ]);

            if ($CrearInquilino) {
                return to_route('clientes.inquilinos')->with('status', 1);
            } else {
                return to_route('clientes.inquilinos')->with(['status' => 2, 'error' => 'No se pudo crear el propietario.']);
            }
        } catch (\Exception $e) {
            // Puedes mostrar el error en la vista con @if(session('error')) ...
            return to_route('clientes.inquilinos')->with(['status' => 2, 'error' => $e->getMessage()]);
        }
    }


    public function showInquilino($id)
    {
        $cliente = Cliente::with('tipoDocumento')->findOrFail($id);
        return view('inquilinos.show', compact('cliente'));
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
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
