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
        Schema::create('areas', function (Blueprint $table) {
            $table->id(); // id_area
            $table->foreignId('inventarios_id')->constrained('inventarios')->onDelete('cascade');
            $table->string('nombre_area'); // Ej: Sala, Comedor, Baño, Cuarto
            $table->text('descripcion')->nullable();
            $table->timestamps(); // Incluye created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
