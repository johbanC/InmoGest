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
            PermisosFiadorSeeder::class,
            PermisosFichaTecnicaSeeder::class,
            PermisosInquilinosSeeder::class,
            PermisosInventariosSeeder::class,
            PermisosPropietariosSeeder::class,
            TipoEstatusesSeeder::class,
            TipoClienteSeeder::class,
            TipoDocumentoSeeder::class,
            TiposPorteriasSeeder::class,
            TiposInmueblesSeeder::class,
            TiposTransaccionesSeeder::class,
            TiposCocinasSeeder::class,
            TiposCalentadoresSeeder::class,
        ]);
    }
}
