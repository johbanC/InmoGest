<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaTecnica;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $cantidadFichasTecnicas = FichaTecnica::count();
        return view('index', compact('cantidadFichasTecnicas'));

/*
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('errors.404');


        return view('index');*/
    }
}
