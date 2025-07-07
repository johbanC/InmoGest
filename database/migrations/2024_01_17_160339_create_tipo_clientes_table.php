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
        Schema::create('tipo_clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('acronimo');
            $table->string('descripcion')->nullable();



            // Como tal en la base de datos siempre tiene que tener el id del usuario
            // para saber quien lo creo
            // y el id del estado para saber si esta activo o no


            $table->foreignId('tipo_estatus_id')->constrained('tipo_estatus');
            $table->foreignId('user_id')->constrained();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_clientes');
    }
};
