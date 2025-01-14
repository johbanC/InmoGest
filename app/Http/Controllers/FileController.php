<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File as FileSystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $fichaTecnicaId)
    {
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
            foreach ($request->fotos[$index] as $foto) {
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
    
        return response()->json(['message' => 'Imágenes guardadas con éxito'], 200);
    }
    

    public function updateImages(Request $request, $fichaTecnicaId, $fichaTecnicaCarpeta)
    {
        
    // Verificar si hay archivos de imágenes en la solicitud
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
            // Generar el nombre del archivo
                $fileName = time(). '_'. $image->getClientOriginalName();
                $filePath = 'public/images/'. $fichaTecnicaCarpeta. '/'. $fileName;

            // Almacenar la imagen
                $image->storeAs('public/images/'. $fichaTecnicaCarpeta, $fileName);

            // Crear un nuevo registro en la base de datos
                $fichaTecnicaId->update([
                    'url' => 'storage/images/'. $fichaTecnicaCarpeta. '/'. $fileName,
                    'tipo' => 'ficha tecnica',
                    'carpeta' => $fichaTecnicaCarpeta,
                    'user_id' => auth()->id(),

                ]);
            }
        }

        return response()->json(['message' => 'Imágenes actualizadas con éxito'], 200);
    }


    public function addImages(Request $request, $fichaTecnicaId, $fichaTecnicaCarpeta){
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
            // Generar el nombre del archivo
                $fileName = time(). '_'. $image->getClientOriginalName();
                $filePath = 'public/images/'. $fichaTecnicaCarpeta. '/'. $fileName;

            // Almacenar la imagen
                $image->storeAs('public/images/'. $fichaTecnicaCarpeta, $fileName);

            // Crear un nuevo registro en la base de datos
                File::create([
                    'url' => 'storage/images/'. $fichaTecnicaCarpeta. '/'. $fileName,
                    'tipo' => 'ficha tecnica',
                    'carpeta' => $fichaTecnicaCarpeta,
                    'user_id' => auth()->id(),
                    'ficha_tecnicas_id' => $fichaTecnicaId,
                ]);
            }
        }

        return redirect()->route('fichastecnicas.edit', $fichaTecnicaId)->with('status', 'Imágenes agregadas con éxito');
    }






    public function eliminarImagen($id){
        $image = File::find($id);

        if ($image) {
        // Eliminar el archivo del almacenamiento
            Storage::delete(str_replace('storage/', 'public/', $image->url));

        // Eliminar el registro de la base de datos
            $image->delete();

            return response()->json(['success' => 'Imagen eliminada correctamente.']);
        } else {
            return response()->json(['error' => 'Imagen no encontrada.'], 404);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
