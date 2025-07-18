<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposCalentadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Gas', 'user_id' => 1],
            ['nombre' => 'Eléctrico', 'user_id' => 1],
            ['nombre' => 'Sin calentador', 'user_id' => 1],
        ];

        foreach ($tipos as $tipo) {
            \App\Models\Calentador::firstOrCreate(
                ['nombre' => $tipo['nombre']],
                ['user_id' => $tipo['user_id']]
            );
        }
    }
}   