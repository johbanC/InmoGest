<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosInventariosSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            'ver inventario',
            'crear inventario',
            //'editar inventario',
            //'eliminar inventario',
            'generar enlace inventario',
            'menu inventario',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}