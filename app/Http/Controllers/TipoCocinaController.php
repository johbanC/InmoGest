<?php

namespace App\Http\Controllers;

use App\Models\TipoCocina;
use Illuminate\Http\Request;

class TipoCocinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        return view('tipococinas.index',[

            'tipococinas' => TipoCocina::with('user')->orderBy('id', 'DESC')->get()

        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('tipococinas.new');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        $request->validate([
            'nombre' => 'required'
        ]);

        TipoCocina::create([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);



        return to_route('tipococinas.index')->with('status',
            [
                'type' => 'success',
                'message' => 'Guardado con exito',
                'title' => 'Registro'
            ]);
    }

    

    /**
     * Display the specified resource.
     */
    public function show(TipoCocina $tipococina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoCocina $tipococina){

        return view('tipococinas.edit', [
            'TipoCocina' => $tipococina,
        ], compact('tipococina'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoCocina $tipococina){

        $request->validate([
            'nombre' => 'required'
        ]);

        $tipococina->update([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);



        return to_route('tipococinas.index')->with('status',
            [
                'type' => 'success',
                'message' => 'Guardado con exito',
                'title' => 'Registro'
            ]);
    
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoCocina $tipococina){
        
        $tipococina->delete();

        return to_route('tipococinas.index')->with('status', [
            'type' => 'success',
            'message' => 'Eliminado con exito',
            'title' => 'Registro'
        ]);
    

    }
}
