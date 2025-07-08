<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposCocinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Integral', 'user_id' => 1],
            ['nombre' => 'Tradicional', 'user_id' => 1],
            ['nombre' => 'Americana', 'user_id' => 1],
            ['nombre' => 'Abierta', 'user_id' => 1],
            ['nombre' => 'Cerrada', 'user_id' => 1],
        ];

        foreach ($tipos as $tipo) {
            \App\Models\TipoCocina::firstOrCreate(
                ['nombre' => $tipo['nombre']],
                ['user_id' => $tipo['user_id']]
            );
        }
    }
} 