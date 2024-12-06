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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // Cambiado esta línea
            $table->date('fecha');
            $table->string('direccion');
            $table->foreignId('tipo_inmuebles_id')->constrained();            
            $table->string('arrendador');
            $table->string('inquilino');
            $table->string('propietario');
            $table->string('nro_llaves');
            $table->text('descripcion')->nullable();
            $table->foreignId('user_id')->constrained();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
