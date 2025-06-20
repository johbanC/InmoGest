<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            [
                'nombre' => 'Cédula de Ciudadanía',
                'acronimo' => 'CC',
                'descripcion' => 'Documento nacional de identidad',
                'tipo_estatus_id' => 1, // Asegúrate que exista este id en tipo_estatuses
                'user_id' => 1, // Asegúrate que exista este id en users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pasaporte',
                'acronimo' => 'PA',
                'descripcion' => 'Documento de viaje internacional',
                'tipo_estatus_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Cédula de Extranjería',
                'acronimo' => 'CE',
                'descripcion' => 'Documento de identidad para extranjeros',
                'tipo_estatus_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}