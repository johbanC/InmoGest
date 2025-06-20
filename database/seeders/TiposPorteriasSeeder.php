<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposPorteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'Portería 24 horas', 'user_id' => 1],
            ['nombre' => '12 Horas', 'user_id' => 1],
            ['nombre' => 'Diurna', 'user_id' => 1],
        ];

        foreach ($tipos as $tipo) {
            \App\Models\TipoPorteria::firstOrCreate(
                ['nombre' => $tipo['nombre']],
                ['user_id' => $tipo['user_id']]
            );
        }
    }
}
