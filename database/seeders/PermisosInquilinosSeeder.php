<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosInquilinosSeeder extends Seeder
{public function run()
    {
        $permisos = [
            'crear inquilinos',
            'ver inquilinos',
            'editar inquilinos',
            'pdf inquilinos',
            'menu inquilinos',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}
