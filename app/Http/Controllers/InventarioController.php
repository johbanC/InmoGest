<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoInmueble;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Area;
use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileSystem;

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


     public function store(Request $request){
        // Validar los datos recibidos
        $request->validate([
            'nombre_area' => 'required|array',
            'nombre_item' => 'required|array',
            'cant' => 'required|array',
            'material' => 'required|array',
            'estado' => 'required|array',
            'observaciones' => 'required|array',
            'fotos' => 'nullable|array',
        ]);

        // Crear el inventario
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

        // Recorrer cada área
        foreach ($request->nombre_area as $index => $nombreArea) {
            // Crear el área
            $areaData = [
                'nombre_area' => $nombreArea,
                'inventarios_id' => $inventario->id,
            ];
        
            // Imprimir la información del área que se va a insertar
           // dump($areaData); // Muestra los datos del área que se va a insertar
        
            $area = Area::create($areaData);
        
            // Verificar si existen items para el área actual
            if (isset($request->nombre_item[$index])) {
                foreach ($request->nombre_item[$index] as $itemIndex => $nombreItem) {
                    // Verificar que todos los campos existan antes de intentar acceder a ellos
                    if (
                        isset($request->cant[$index][$itemIndex]) &&
                        isset($request->material[$index][$itemIndex]) &&
                        isset($request->estado[$index][$itemIndex]) &&
                        isset($request->observaciones[$index][$itemIndex])
                    ) {
                        // Preparar los datos para el ítem
                        $itemData = [
                            'nombre_item' => $nombreItem ?? 'Item ' . ($itemIndex + 1),
                            'cantidad' => $request->cant[$index][$itemIndex],
                            'material' => $request->material[$index][$itemIndex],
                            'estado' => $request->estado[$index][$itemIndex],
                            'observacion' => $request->observaciones[$index][$itemIndex],
                        ];
        
                        // Imprimir la información que se va a insertar
                       // dump($itemData); // Muestra los datos del ítem que se va a insertar
        
                        // Crear el ítem relacionado con el área
                        $area->items()->create($itemData);
                    } else {
                        // Manejo del error si falta algún campo
                        dd("Error: faltan datos para el ítem en el área $index, ítem $itemIndex.");
                    }
                }
            } else {
                // Manejo del error si no es un array
                dd("Error: no se ha enviado un array válido para 'nombre_item[$index]'.");
            }
        
            // Guardar las fotos del área usando el ID del área
            if (isset($request->fotos[$index])) {

                dd($request->fotos[$index]->getClientOriginalName);
                // Generar un nombre único para la carpeta que almacenará las fotos
                $folderName = $inventario->codigo . '_' . Str::random(10);

                // Definir el path de la carpeta donde se almacenarán las fotos
                $folderPath = storage_path('app/public/images/' . $folderName);

                // Verificar si la carpeta ya existe antes de crearla
                if (!FileSystem::exists($folderPath)) {
                    // Crear la carpeta con permisos 0777 y recursividad true
                    FileSystem::makeDirectory($folderPath, 0777, true);
                }

                // Recorrer cada foto enviada en la solicitud
                foreach ($request->fotos as $foto) {
                    // Generar un nombre único para la foto
                    $fileName = time() . '_' . $foto->getClientOriginalName();

                    // Almacenar la foto en la carpeta correspondiente
                    $foto->storeAs('images/' . $folderName, $fileName, 'public');

                    // Crear un registro en la base de datos para la foto
                    $area->fotos()->create([
                        'ruta_foto' => 'storage/images/' . $folderName . '/' . $fileName, // URL de la foto
                        'area_id' => $area->id, // ID del área
                        'codigo' => $inventario->codigo, // Código del inventario
                        'carpeta' => $folderName, // Carpeta donde se almacena la foto
                        'tipo' => 'Inventario', // Tipo de archivo
                    ]);
                }
            }
        }

        // Redirigir con un mensaje de éxito
        return to_route('inventarios.index')->with('status', 1);
    }


















    public function storeeeee(Request $request)
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

        //        dd($request->all());

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


        // Verificar que se haya enviado el array de áreas
        if ($request->has('nombre_area') && is_array($request->nombre_area)) {
            $areas = $request->nombre_area;

            foreach ($areas as $index => $nombre_area) {
                // Crear el área y asociarla con el inventario
                $area = $inventario->areas()->create([
                    'nombre_area' => $nombre_area,
                    'inventarios_id' => $inventario->id,
                ]);

                // Verificar que se haya enviado el array de cantidades
                if (isset($request->cant[$index]) && is_array($request->cant[$index])) {
                    foreach ($request->cant[$index] as $itemIndex => $cantidad) {
                        // Asegúrate de que los otros campos también existan y sean arrays
                        if (
                            isset($request->material[$index][$itemIndex]) &&
                            isset($request->estado[$index][$itemIndex]) &&
                            isset($request->observaciones[$index][$itemIndex])
                        ) {

                            // Crear los ítems relacionados con el área usando el ID del área
                            $area->items()->create([
                                'nombre_item' => $request->nombre_item[$index][$itemIndex] ?? 'Item ' . ($itemIndex + 1), // Asignar un nombre por defecto si no se proporciona
                                'cantidad' => $cantidad,
                                'material' => $request->material[$index][$itemIndex],
                                'estado' => $request->estado[$index][$itemIndex],
                                'observacion' => $request->observaciones[$index][$itemIndex],
                            ]);
                        } else {
                            // Manejo del error si falta algún campo
                            dd("Error: faltan datos para el ítem en el área $index, ítem $itemIndex.");
                        }
                    }
                } else {
                    // Manejo del error si no es un array
                    dd("Error: no se ha enviado un array válido para 'cant[$index]'.");
                }

                // Guardar las fotos del área usando el ID del área
                if (isset($request->fotos[$index])) {
                    // Generar un nombre único para la carpeta que almacenará las fotos
                    $folderName = $inventario->codigo . '_' . Str::random(10);

                    // Definir el path de la carpeta donde se almacenarán las fotos
                    $folderPath = storage_path('app/public/images/' . $folderName);

                    // Verificar si la carpeta ya existe antes de crearla
                    if (!FileSystem::exists($folderPath)) {
                        // Crear la carpeta con permisos 0777 y recursividad true
                        FileSystem::makeDirectory($folderPath, 0777, true);
                    }

                    // Recorrer cada foto enviada en la solicitud
                    foreach ($request->fotos as $foto) {
                        // Generar un nombre único para la foto
                        $fileName = time() . '_' . $foto->getClientOriginalName();

                        // Almacenar la foto en la carpeta correspondiente
                        $foto->storeAs('images/' . $folderName, $fileName, 'public');

                        // Crear un registro en la base de datos para la foto
                        $area->fotos()->create([
                            'ruta_foto' => 'storage/images/' . $folderName . '/' . $fileName, // URL de la foto
                            'area_id' => $area->id, // ID del área
                            'codigo' => $inventario->codigo, // Código del inventario
                            'carpeta' => $folderName, // Carpeta donde se almacena la foto
                            'tipo' => 'Inventario', // Tipo de archivo
                        ]);
                    }
                }
            }
        }



        //dd($request->all());



        if ($inventario) {
            // $FileController = new FileController();
            // $FileController->store($request, $FichaTecnica->id);
            return to_route('inventarios.index')->with('status', 1);
        } else {
            return to_route('inventarios.index')->with('status', 2);
        }
    }

    public function storeee(Request $request)
    {
        // Verificar los datos recibidos
        dd($request->all());

        // Procesar los datos
        foreach ($request->nombre_area as $areaIndex => $areaName) {
            // Crear el área
            $area = Area::create([
                'nombre' => $areaName,
                'inventario_id' => $request->inventario_id, // Asegúrate de tener el ID del inventario
            ]);

            // Verificar si existen items para el área actual
            if (isset($request->nombre_item[$areaIndex])) {
                // Procesar los items del área
                foreach ($request->nombre_item[$areaIndex] as $itemIndex => $itemName) {
                    $item = $area->items()->create([
                        'nombre_item' => $itemName,
                        'cantidad' => $request->cant[$areaIndex][$itemIndex] ?? null,
                        'material' => $request->material[$areaIndex][$itemIndex] ?? null,
                        'estado' => $request->estado[$areaIndex][$itemIndex] ?? null,
                        'observacion' => $request->observaciones[$areaIndex][$itemIndex] ?? null,
                    ]);

                    echo $item->all();

                    // Procesar las fotos del item
                    if ($request->hasFile("fotos.{$areaIndex}.{$itemIndex}")) {
                        foreach ($request->file("fotos.{$areaIndex}.{$itemIndex}") as $foto) {

                            dd($foto);
                            // Generar un nombre único para la foto
                            $fileName = time() . '_' . $foto->getClientOriginalName();

                            // Almacenar la foto en la carpeta correspondiente
                            $folderName = 'comedor_' . $areaIndex;
                            $foto->storeAs('images/' . $folderName, $fileName, 'public');

                            // Crear un registro en la base de datos para la foto
                            $item->fotos()->create([
                                'ruta_foto' => 'storage/images/' . $folderName . '/' . $fileName, // URL de la foto
                                'codigo' => $request->codigo, // Código del inventario
                                'carpeta' => $folderName, // Carpeta donde se almacena la foto
                                'tipo' => 'Inventario', // Tipo de archivo
                            ]);
                        }
                    }
                }
            }
        }
        //dd($request->all());
        // Redirigir con un mensaje de éxito
        return redirect()->route('inventarios.index')->with('status', 1);
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
