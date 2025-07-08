<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposTransaccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Venta', 'user_id' => 1],
            ['nombre' => 'Arriendo', 'user_id' => 1],
        ];

        foreach ($tipos as $tipo) {
            \App\Models\TipoTransaccion::firstOrCreate(
                ['nombre' => $tipo['nombre']],
                ['user_id' => $tipo['user_id']]
            );
        }
    }
}