<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosFiadorSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            'menu fiadores',
            'ver fiadores',
            'crear fiadores',
            'editar fiadores',
            'eliminar fiadores',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}
