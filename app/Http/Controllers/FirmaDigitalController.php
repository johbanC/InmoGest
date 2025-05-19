<?php

namespace App\Http\Controllers;

use App\Models\FirmaDigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FirmaDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = FirmaDigital::query();

        // Filtros
        if ($request->has('tipo_documento')) {
            $query->where('documentable_type', $request->tipo_documento);
        }

        if ($request->has('documento_id')) {
            $query->where('documentable_id', $request->documento_id);
        }

        if ($request->has('rol_firmante')) {
            $query->where('rol_firmante', $request->rol_firmante);
        }

        return response()->json([
            'data' => $query->latest()->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'documentable_type' => 'required|string',
            'documentable_id' => 'required|integer',
            'rol_firmante' => 'required|string|max:50',
            'nombre_firmante' => 'required|string|max:255',
            'tipo_documento_firmante' => 'required|string|in:DNI,Pasaporte,CC,RUC,Otro',
            'numero_documento_firmante' => 'required|string|max:30',
            'firma_digital_path' => 'required|string', // base64
            'foto_firmante' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'consentimiento' => 'required|accepted',
            'snapshot_data' => 'nullable|array',
            'dispositivo' => 'nullable|array',
            'codigo' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        $ip = $request->ip();
        $codigoInventario = $data['codigo'];
        $firma_digital_base64 = $data['firma_digital_path'];

        $carpetaDestino = "firmas_digitales/{$codigoInventario}";
        Storage::disk('public')->makeDirectory($carpetaDestino);

        $guardarFirmaBase64 = function ($base64, $codigo, $carpeta) {
            if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
                $extension = strtolower($type[1]);
                $base64 = substr($base64, strpos($base64, ',') + 1);
                $imagen = base64_decode($base64);

                if ($imagen === false) {
                    throw new \Exception('No se pudo decodificar la firma.');
                }

                $fileName = "{$codigo}_entrega_" . time() . ".{$extension}";
                $ruta = "{$carpeta}/{$fileName}";

                Storage::disk('public')->put($ruta, $imagen);
                return $ruta;
            }

            throw new \Exception("Formato base64 inválido para la firma.");
        };

        try {
            $rutaFirma = $guardarFirmaBase64($firma_digital_base64, $codigoInventario, $carpetaDestino);

            $rutaFoto = null;
            if ($request->hasFile('foto_firmante')) {
                $foto = $request->file('foto_firmante');
                $extension = $foto->getClientOriginalExtension();
                $fileName = "{$codigoInventario}_foto_entrega_" . time() . ".{$extension}";
                $rutaFoto = $foto->storeAs($carpetaDestino, $fileName, 'public');
            }

            // Preparar datos para el json base64
            $datosHash = [
                'tipo_documento_firmante' => trim($data['tipo_documento_firmante']),
                'numero_documento_firmante' => trim($data['numero_documento_firmante']),
                'nombre_firmante' => trim($data['nombre_firmante']),
                'firma_digital_base64' => $firma_digital_base64,
            ];

            ksort($datosHash);
            $jsonDatosHash = json_encode($datosHash, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            // Guardar sin el hash
            $registro = FirmaDigital::create([
                'documentable_type' => $data['documentable_type'],
                'documentable_id' => $data['documentable_id'],
                'rol_firmante' => $data['rol_firmante'],
                'nombre_firmante' => $data['nombre_firmante'],
                'tipo_documento_firmante' => $data['tipo_documento_firmante'],
                'numero_documento_firmante' => $data['numero_documento_firmante'],
                'firma_digital_path' => $rutaFirma,
                'firma_digital_base64' => $firma_digital_base64,
                'json_base64' => $jsonDatosHash,
                'foto_firmante_path' => $rutaFoto,
                'consentimiento' => true,
                'snapshot_data' => $data['snapshot_data'] ?? null,
                'dispositivo' => $data['dispositivo'] ?? null,
                'ip_address' => $ip,
                'fecha_firma' => now(),
            ]);

            // Generar y guardar el hash de validación desde json_base64
            $this->generarHashDesdeJsonBase64($registro);



            // return response()->json(['success' => true, 'data' => $registro], 201);
            return redirect()->route('inventarios.show', ['inventario' => $data['documentable_id']])->with('status', 1);
        } catch (\Exception $e) {
            return to_route('inventarios.show')->with('status', 2);
            // return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    private function generarHashDesdeJsonBase64(FirmaDigital $firma)
    {
        try {
            $json = $firma->json_base64;
            if (!$json) {
                throw new \Exception("El campo json_base64 está vacío.");
            }

            $datos = json_decode($json, true);
            if (!is_array($datos)) {
                throw new \Exception("El json_base64 no es válido.");
            }

            ksort($datos);
            $jsonOrdenado = json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $hash = hash('sha256', $jsonOrdenado);

            \Log::info('Hash generado desde función externa', [
                'json' => $jsonOrdenado,
                'hash' => $hash
            ]);

            $firma->hash_validacion = $hash;
            $firma->save();
        } catch (\Exception $e) {
            \Log::error("Error al generar el hash desde json_base64: " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FirmaDigital $firmaDigital)
    {
        return response()->json([
            'data' => $firmaDigital->load('documentable')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FirmaDigital $firmaDigital)
    {
        // Borrado lógico (soft delete)
        $firmaDigital->delete();

        return response()->json([
            'message' => 'Firma marcada como eliminada'
        ]);
    }

    /**
     * Verifica la integridad de una firma
     */
    public function verificar(FirmaDigital $firmaDigital)
    {
        return response()->json([
            'valida' => $firmaDigital->verificarIntegridad(),
            'fecha_verificacion' => now()->toDateTimeString()
        ]);
    }

    /**
     * Método para guardar archivos en base64
     */
    private function guardarArchivo($base64, $directorio)
    {
        $extension = explode('/', mime_content_type($base64))[1];
        $data = explode(',', $base64)[1];
        $nombre = Str::random(40) . '.' . $extension;

        Storage::put("public/{$directorio}/{$nombre}", base64_decode($data));

        return "storage/{$directorio}/{$nombre}";
    }
}
