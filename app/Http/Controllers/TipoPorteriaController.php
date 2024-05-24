<?php

namespace App\Http\Controllers;

use App\Models\TipoPorteria;
use Illuminate\Http\Request;

class TipoPorteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        return view('tipoporterias.index',[

            'tipoporterias' => TipoPorteria::with('user')->orderBy('id', 'DESC')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

                return view('tipoporterias.new');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        $request->validate([
            'nombre' => 'required'
        ]);

        TipoPorteria::create([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);



        return to_route('tipoporterias.index')->with('status',
            [
                'type' => 'success',
                'message' => 'Guardado con exito',
                'title' => 'Registro'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoPorteria $tipoporteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoPorteria $tipoporteria){

        return view('tipoporterias.edit', [
            'TipoPorteria' => $tipoporteria,
        ], compact('tipoporteria'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoPorteria $tipoporteria){
        
        $request->validate([
            'nombre' => 'required'
        ]);

        $tipoporteria->update([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);



        return to_route('tipoporterias.index')->with('status',
            [
                'type' => 'success',
                'message' => 'Actualizado con exito',
                'title' => 'Registro'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoPorteria $tipoporteria){
        
        $tipoporteria->delete();

        return to_route('tipoporterias.index')->with('status', [
            'type' => 'success',
            'message' => 'Eliminado con exito',
            'title' => 'Registro'
        ]);
    }
}
