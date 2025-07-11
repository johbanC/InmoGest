<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\TipoInmueble;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileSystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\Inventario;
use App\Models\Area; // <-- AGREGA ESTA LÍNEA
use App\Models\Cliente;
use App\Models\Item;
use App\Models\Foto;
use App\Models\FirmaDigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $inventarios = Inventario::with([
            'user:id,name',
            'tipo_inmueble:id,nombre',
            'firmaEntrega',
            'firmaRecibe'
        ])
            ->orderBy('id', 'desc')
            ->get();

        return view('inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoinmuebles = TipoInmueble::all()->pluck('nombre', 'id');

        // Traer solo los clientes tipo INQUI con su tipoDocumento
        $inquilinos = \App\Models\Cliente::with('tipoDocumento')
            ->whereHas('tipoCliente', function ($q) {
                $q->where('acronimo', 'INQUI');
            })
            ->orderBy('nombre')
            ->limit(5)
            ->get();

        return view('inventarios.new', compact('tipoinmuebles', 'inquilinos'));
    }




    public function buscarInquilinos(Request $request)
    {
        $search = $request->input('q');
        $results = \App\Models\Cliente::with('tipoDocumento')
            ->whereHas('tipoCliente', function ($q) {
                $q->where('acronimo', 'INQUI');
            })
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                    ->orWhere('apellido', 'like', "%$search%")
                    ->orWhere('numero_documento', 'like', "%$search%");
            })
            ->orderBy('nombre')
            ->limit(20)
            ->get();

        $formatted = [];
        foreach ($results as $inquilino) {
            $formatted[] = [
                'id' => $inquilino->id,
                'text' => ($inquilino->tipoDocumento->acronimo ?? '') . ' ' . $inquilino->numero_documento . ' - ' . $inquilino->nombre . ' ' . $inquilino->apellido
            ];
        }
        return response()->json(['results' => $formatted]);
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {

        // Aumentar límites temporalmente
        ini_set('max_file_uploads', 2000);
        //verifcar que llega el request
        // dd($request->all());

        // Validar los datos recibidos
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            // 'inquilino' => 'required|string',
            // 'numero_inquilino' => 'required|string',
            'direccion' => 'required|string',
            'tipo_inmuebles_id' => 'required|exists:tipo_inmuebles,id',
            'nombre_propiedad' => 'required|string',
            // 'email_inquilino' => 'required|email',
            'nombre_area' => 'required|array',
            'nombre_item' => 'required|array',
            'cant' => 'required|array',
            'material' => 'required|array',
            'estado' => 'required|array',
            'observaciones' => 'required|array',
            'fotos' => 'nullable|array',
            'fotos.*' => 'nullable|array', // Validar que cada elemento de fotos es un array
            'fotos.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp', // Tipos MIME específicos
        ]);

        // Crear el inventario
        $inventario = Inventario::create([
            'cliente_id' => $request->cliente_id,
            'nombre_propiedad' => $request->nombre_propiedad,
            'numero_inquilino' => $request->numero_inquilino,
            'email_inquilino' => $request->email_inquilino,
            'fecha' => now()->format('Y-m-d'),
            'direccion' => $request->direccion,
            'tipo_inmuebles_id' => $request->tipo_inmuebles_id,
            'arrendador' => $request->arrendador,
            'inquilino' => $request->inquilino,
            'propietario' => $request->propietario,
            'nro_llaves' => $request->nro_llaves,
            'user_id' => auth()->id(),
        ]);

        // Generar el nombre de la carpeta principal
        $folderName = $inventario->codigo . '_' . Str::random(10);
        $baseStoragePath = 'public/images/inventarios/' . $folderName;
        $basePublicPath = 'storage/images/inventarios/' . $folderName;

        // Crear directorio principal si no existe
        if (!Storage::exists($baseStoragePath)) {
            Storage::makeDirectory($baseStoragePath, 0777, true);
        }

        // Procesar cada área
        foreach ($request->nombre_area as $index => $nombreArea) {

            // Crear el área
            $area = Area::create([
                'nombre_area' => $nombreArea,
                'inventarios_id' => $inventario->id,
            ]);

            // Procesar los ítems de cada área
            if (isset($request->nombre_item[$index])) {
                foreach ($request->nombre_item[$index] as $itemIndex => $nombreItem) {
                    $area->items()->create([
                        'nombre_item' => $nombreItem ?? 'Item ' . ($itemIndex + 1),
                        'cantidad' => $request->cant[$index][$itemIndex],
                        'material' => $request->material[$index][$itemIndex],
                        'estado' => $request->estado[$index][$itemIndex],
                        'observacion' => $request->observaciones[$index][$itemIndex],
                    ]);
                }
            }

            // Procesar fotos para el área actual
            $this->procesarFotosArea($request, $index, $area, $baseStoragePath, $basePublicPath, $inventario->codigo);
        }



        if ($inventario) {
            return to_route('inventarios.index')->with('status', 1);
        } else {
            return to_route('inventarios.index')->with('status', 2);
        }
        // }

        //     return to_route('inventarios.index')->with('status', 'Inventario creado correctamente');
    }





    protected function procesarFotosArea($request, $areaIndex, $area, $baseStoragePath, $basePublicPath, $codigoInventario)
    {

        // Aumentar límites temporalmente
        ini_set('max_file_uploads', 2000);

        //dd($request->all());


        // Verificar si hay fotos para esta área
        if (empty($request->fotos) || !isset($request->fotos[$areaIndex]) || !is_array($request->fotos[$areaIndex])) {
            return;
        }

        // Crear subcarpeta para el área
        $areaFolderStorage = $baseStoragePath . '/area_' . $area->id;
        $areaFolderPublic = $basePublicPath . '/area_' . $area->id;

        if (!Storage::exists($areaFolderStorage)) {
            Storage::makeDirectory($areaFolderStorage, 0777, true);
        }

        // Procesar cada foto
        foreach ($request->fotos[$areaIndex] as $foto) {
            if ($foto && $foto->isValid()) {
                $extension = $foto->getClientOriginalExtension();
                $fileName = $codigoInventario . '_area' . $area->id . '_' . time() . '_' . Str::random(5) . '.' . $extension;

                try {
                    // Almacenar la foto
                    $foto->storeAs($areaFolderStorage, $fileName);

                    // Registrar en la base de datos
                    $area->fotos()->create([
                        'ruta_foto' => $areaFolderPublic . '/' . $fileName,
                        'area_id' => $area->id,
                        'codigo' => $codigoInventario,
                        'carpeta' => $areaFolderStorage,
                        'tipo' => 'Inventario',
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error al guardar foto para área {$area->id}", [
                        'error' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'area_id' => $area->id,
                        'user_id' => auth()->id() ?? 'guest',
                        'file_data' => [
                            'original_name' => $foto->getClientOriginalName(),
                            'size' => $foto->getSize(),
                            'mime_type' => $foto->getMimeType()
                        ]
                    ]);
                }
            }
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        return('aqui estoy');
    //     // Cargar áreas con sus relaciones y las firmas digitales polimórficas
    //     $inventario->load(['areas.items', 'areas.fotos', 'firmasDigitales']);

    //     $firmas = $inventario->firmasDigitales; // colección de firmas asociadas

    //     // Filtrar las firmas por tipo: 'entrega' y 'recibe' (según tu campo 'tipo' o similar)
    //     $firmaEntrega = $firmas->firstWhere('rol_firmante', 'Entrega');
    //     $firmaRecibe = $firmas->firstWhere('rol_firmante', 'Recibe');

    //     $cliente = $inventario->cliente; // Obtener el cliente asociado al inventario

    //     return view('inventarios.show', [
    //         'inventario' => $inventario,
    //         'areas' => $inventario->areas,
    //         'firmas' => $firmas,
    //         'firmaEntrega' => $firmaEntrega,
    //         'firmaRecibe' => $firmaRecibe,
    //         'cliente' => $cliente,
    //     ]);
    // }





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


    public function generarEnlaceFirmaRemota(Inventario $inventario, $rol)
    {
        $url = \Illuminate\Support\Facades\URL::signedRoute('inventarios.firmaremota', [
            'inventario' => $inventario->id,
            'rol' => $rol, // 'entrega' o 'recibe'
            'ubicacion' => 'remoto' //
        ], now()->addMinutes(30)); // Expira en 30 minutos

        // Retorna una vista mostrando el enlace
        return view('inventarios.enlace-firma', compact('url', 'inventario', 'rol'));
    }

    public function firmaremota(Inventario $inventario, $rol)
    {
        // Cargar áreas con sus relaciones y las firmas digitales polimórficas
        $inventario->load(['areas.items', 'areas.fotos', 'firmasDigitales']);

        $firmas = $inventario->firmasDigitales; // colección de firmas asociadas

        // Filtrar las firmas por tipo: 'entrega' y 'recibe' (según tu campo 'tipo' o similar)
        $firmaEntrega = $firmas->firstWhere('rol_firmante', 'Entrega');
        $firmaRecibe = $firmas->firstWhere('rol_firmante', 'Recibe');

        return view('inventarios.firmaremota', [
            'inventario' => $inventario,
            'areas' => $inventario->areas,
            'firmas' => $firmas,
            'firmaEntrega' => $firmaEntrega,
            'firmaRecibe' => $firmaRecibe,
        ]);
    }
}
