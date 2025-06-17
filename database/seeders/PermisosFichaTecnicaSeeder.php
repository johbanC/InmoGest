<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosFichaTecnicaSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            'crear ficha tecnica',
            'ver ficha tecnica',
            'editar ficha tecnica',
            'pdf ficha tecnica',
            'menu ficha tecnica',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}