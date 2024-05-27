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

        $tipoporteria = TipoPorteria::create([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);

        if ($tipoporteria) {
            return to_route('tipoporterias.index')->with('status', 1);
        } else {
            return to_route('tipoporterias.index')->with('status', 2);
        }
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



        if ($tipoporteria) {
            return to_route('tipoporterias.index')->with('status', 3);
        } else {
            return to_route('tipoporterias.index')->with('status', 4);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoPorteria $tipoporteria){

        $tipoporteria->delete();

        if ($tipoporteria) {
            return to_route('tipoporterias.index')->with('status', 5);
        } else {
            return to_route('tipoporterias.index')->with('status', 6);
        }
    }
}
