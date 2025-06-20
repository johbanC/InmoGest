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
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('acronimo')->nullable();
            $table->string('descripcion')->nullable();
            $table->foreignId('tipo_estatus_id')->constrained('tipo_estatuses');
            $table->foreignId('tipo_estatus_id')->constrained('tipo_estatuses');
            $table->foreignId('user_id')->constrained('users');
                

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_documentos');
    }
};
