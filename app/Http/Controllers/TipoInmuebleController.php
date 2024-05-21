<?php

namespace App\Http\Controllers;

use App\Models\TipoInmueble;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoInmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        //return view('tiposinmuebles.index');

        return view('tiposinmuebles.index',[

            'tiposinmuebles' => TipoInmueble::with('user')->orderBy('id', 'DESC')->get()

        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('tiposinmuebles.new');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required'
        ]);

        TipoInmueble::create([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);



        return to_route('tiposinmuebles.index')->with('status',
            [
                'type' => 'success',
                'message' => 'Guardado con exito',
                'title' => 'Registro'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoInmueble $tipoInmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoInmueble $tipoinmueble){

        return view('tiposinmuebles.edit', [
            'TipoInmueble' => $tipoinmueble,
        ], compact('tipoinmueble'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoInmueble $tipoinmueble){

        $request->validate([
            'nombre' => 'required'
        ]);

        $tipoinmueble->update([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);



        return to_route('tiposinmuebles.index')->with('status',
            [
                'type' => 'success',
                'message' => 'Guardado con exito',
                'title' => 'Registro'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoInmueble $tipoinmueble){
        
        $tipoinmueble->delete();

        return to_route('tiposinmuebles.index')->with('status', [
            'type' => 'success',
            'message' => 'Eliminado con exito',
            'title' => 'Registro'
        ]);
    }
}
