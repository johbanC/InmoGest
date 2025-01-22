<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoInmueble;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileSystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Inventario;
use App\Models\Area;
use App\Models\Item;
use App\Models\Foto;
use Illuminate\Http\Request;

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
        // Validar los datos recibidos
        $request->validate([
            'nombre_area' => 'required|array',
            'nombre_item' => 'required|array',
            'cant' => 'required|array',
            'material' => 'required|array',
            'estado' => 'required|array',
            'observaciones' => 'required|array',
            'fotos' => 'nullable|array',
            'fotos.*.*' => 'nullable|image|max:2048', // Validar que cada archivo sea una imagen
        ]);

        // Crear el inventario
        $fecha = now()->format('Y-m-d'); // Formatear la fecha

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

        // Generar el nombre de la carpeta una sola vez
        $folderName = $inventario->codigo . '_' . Str::random(10);

        // Crear la carpeta si no existe
        $folderPath = storage_path('app/public/images/' . $folderName);
        if (!FileSystem::exists($folderPath)) {
            FileSystem::makeDirectory($folderPath, 0777, true);
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

            // Guardar las fotos de cada área en su propia carpeta dentro de la carpeta del inventario
            if (isset($request->fotos[$index])) {
                $fotos = $request->file("fotos.{$index}");

                if ($fotos && is_array($fotos)) {
                    foreach ($fotos as $foto) {
                        if ($foto instanceof \Illuminate\Http\UploadedFile) {
                            // Generar un nombre único para la foto
                            $fileName = $inventario->codigo . '_' . time() . '_' . Str::random(5) . '.' . $foto->getClientOriginalExtension();

                            try {
                                // Crear una subcarpeta para el área dentro de la carpeta del inventario
                                $areaFolder = $folderName . '/area_' . $area->id;

                                // Almacenar la foto en la subcarpeta del área
                                Storage::disk('public')->putFileAs('images/' . $areaFolder, $foto, $fileName);

                                // Crear un registro de la foto en la base de datos
                                $area->fotos()->create([
                                    'ruta_foto' => 'storage/images/' . $areaFolder . '/' . $fileName, // Ruta de acceso de la foto
                                    'area_id' => $area->id, // ID del área
                                    'codigo' => $inventario->codigo, // Código del inventario
                                    'carpeta' => $folderName, // Carpeta principal del inventario
                                    'tipo' => 'Inventario', // Tipo de archivo
                                ]);
                            } catch (\Exception $e) {
                                dd('Error al almacenar la foto: ' . $e->getMessage());
                            }
                        }
                    }
                }
            }
        }

        // Redirigir con un mensaje de éxito
        return to_route('inventarios.index')->with('status', 1);
    }


    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario){
        
        //return view('inventarios.show', compact('inventario'));
        return view('inventarios.show', [
            'inventario' => $inventario,
            'areas' => $inventario->areas()->with('items', 'fotos')->get(),
        ]);
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
