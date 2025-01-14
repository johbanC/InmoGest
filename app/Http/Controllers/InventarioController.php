<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoInmueble;
use Barryvdh\DomPDF\Facade\Pdf;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('inventarios.index', [

            'inventarios' => Inventario::with('user')->orderBy('id', 'DESC')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $tipoinmuebles = TipoInmueble::all()->pluck('nombre', 'id');
        return view('inventarios.new', compact('tipoinmuebles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        /*
        $request->validate([
            'fecha' => 'required',
            'direccion' => ['required', 'min:3'],
            'tipo_inmueble' => 'required',
            'arrendador' => ['required', 'min:3'],
            'inquilino' => ['required', 'min:3'],
            'propietario' => ['required', 'min:3'],
            'nro_llaves' => ['required', 'min:1']
        ]);
        */

        $fecha = now()->format('Y-m-d'); // Formatear la fecha al formato adecuado para la base de datos

        $inventario = Inventario::create([
            'nombre_propiedad' => $request->get('nombre_propiedad'),
            'numero_inquilino' => $request->get('numero_inquilino'),
            'email_inquilino' => $request->get('email_inquilino'),
            'fecha' => $fecha,
            'direccion' => $request->get('direccion'),
            'tipo_inmuebles_id' => $request->get('tipo_inmuebles_id'),
            'arrendador' => $request->get('arrendador'),
            'inquilino' => $request->get('inquilino'),
            'propietario' => $request->get('propietario'),
            'nro_llaves' => $request->get('nro_llaves'),
            'user_id' => auth()->id(),
        ]);


        dd($request->all());



        if ($inventario) {
            // $FileController = new FileController();
            // $FileController->store($request, $FichaTecnica->id);
            return to_route('inventarios.index')->with('status', 1);
        } else {
            return to_route('inventarios.index')->with('status', 2);
        }
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
