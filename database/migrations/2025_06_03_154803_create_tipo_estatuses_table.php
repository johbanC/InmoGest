<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('tipo_estatus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('acronimo')->nullable();
            $table->string('descripcion')->nullable();
        });

        // Insertar registros iniciales
        \DB::table('tipo_estatus')->insert([
            [
                'nombre' => 'Activo',
                'acronimo' => 'ACT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Eliminado',
                'acronimo' => 'ELI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pendiente',
                'acronimo' => 'PEN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Aprobado',
                'acronimo' => 'APRO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_estatuses');
    }
};
