<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposInmueblesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Apartamento', 'user_id' => 1],
            ['nombre' => 'Casa', 'user_id' => 1],
            ['nombre' => 'Oficina', 'user_id' => 1],
            ['nombre' => 'Local', 'user_id' => 1],
            ['nombre' => 'Bodega', 'user_id' => 1],
            ['nombre' => 'Lote', 'user_id' => 1],
        ];

        foreach ($tipos as $tipo) {
            \App\Models\TipoInmueble::firstOrCreate(
                ['nombre' => $tipo['nombre']],
                ['user_id' => $tipo['user_id']]
            );
        }
    }
}