<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaTecnica;
use App\Models\Inventario;


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




        $espacioLibre = disk_free_space("/");
        $espacioTotal = disk_total_space("/");

        // Convertir a GB
        $espacioLibreGB = round($espacioLibre / 1073741824, 2); // 1 GB = 1073741824 bytes
        $espacioTotalGB = round($espacioTotal / 1073741824, 2);


        $cantidadFichasTecnicas = FichaTecnica::count();
        $CantidadInventarios = Inventario::count();
        return view('index', compact('cantidadFichasTecnicas', 'CantidadInventarios', 'espacioLibreGB', 'espacioTotalGB'));




        /*
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('errors.404');


        return view('index');*/
    }
}
