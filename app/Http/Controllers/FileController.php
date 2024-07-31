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
    public function store(Request $request, $fichaTecnicaId){
    // ...


        if ($request->hasFile('imagenes')) {
        // Generar nombre de la carpeta (utilizar el mismo nombre para todas las imágenes)
            $folderName = $fichaTecnicaId . '_' . Str::random(10);

        // Crear la carpeta si no existe
            Storage::makeDirectory('public/images/' . $folderName);

            foreach ($request->file('imagenes') as $image) {
            // Guardar el nombre del archivo en la base de datos
                $fileName = time() . '_' . $image->getClientOriginalName();
                $filePath = 'public/images/' . $folderName . '/' . $fileName;

            // Almacenar la imagen
                $image->storeAs('images/' . $folderName, $fileName, 'public');

            // Crear registro en la base de datos
                File::create([
                'url' => 'storage/images/' . $folderName . '/' . $fileName, // Eliminar 'public/' al inicio
                'tipo' => 'ficha tecnica',
                'carpeta' => $folderName,
                'user_id' => auth()->id(),
                'ficha_tecnicas_id' => $fichaTecnicaId,
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
