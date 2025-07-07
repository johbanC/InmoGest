<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermisosPropietariosSeeder::class,
            PermisosFichaTecnicaSeeder::class,
            PermisosClientesSeeder::class,
            PermisosVehiculosSeeder::class,
            PermisosUsuariosSeeder::class,
            PermisosRolesSeeder::class,
            PermisosTipoDocumentoSeeder::class,
            PermisosTipoEstatusSeeder::class,
            PermisosTipoClienteSeeder::class,
            PermisosTipoVehiculoSeeder::class,
        ]);
    }
}
