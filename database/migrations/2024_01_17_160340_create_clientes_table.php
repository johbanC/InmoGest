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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tipo_documento_id')->constrained();
            $table->string('numero_documento');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->foreignId('tipo_cliente_id')->constrained('tipo_clientes');


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
        Schema::dropIfExists('clientes');
    }
};
