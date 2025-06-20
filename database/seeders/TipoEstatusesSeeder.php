<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstatusesSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_estatus')->insert([
            [
                'nombre' => 'Activo',
                'acronimo' => 'ACT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Eliminado',
                'acronimo' => 'ELI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pendiente',
                'acronimo' => 'PEN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Aprobado',
                'acronimo' => 'APRO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}