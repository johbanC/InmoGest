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

        $tipoInmueble = TipoInmueble::create([
            'nombre' => $request->get('nombre'),
            'user_id' => auth()->id(),
        ]);

        if ($tipoInmueble) {
            return to_route('tiposinmuebles.index')->with('status', 1);
        } else {
            return to_route('tiposinmuebles.index')->with('status', 2);
        }
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



        if ($tipoinmueble) {
            return to_route('tiposinmuebles.index')->with('status', 3);
        } else {
            return to_route('tiposinmuebles.index')->with('status', 4);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoInmueble $tipoinmueble){

        $tipoinmueble->delete();

        if ($tipoinmueble) {
            return to_route('tiposinmuebles.index')->with('status', 5);
        } else {
            return to_route('tiposinmuebles.index')->with('status', 6);
        }
    }
}
