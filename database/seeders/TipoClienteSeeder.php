<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoClientesSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_clientes')->insert([
            [
                'nombre' => 'Propietario',
                'acronimo' => 'PRO',
                'tipo_estatus_id' => 1, // Asegúrate que exista este id en tipo_estatuses
                'user_id' => 1,         // Asegúrate que exista este id en users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Inquilino',
                'acronimo' => 'INQUI',
                'tipo_estatus_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Fiador',
                'acronimo' => 'FIA',
                'tipo_estatus_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}