<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoInmueblesIdToInventariosTable extends Migration
{
    public function up()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            // Agregar la columna 'tipo_inmuebles_id' como clave foránea
            $table->foreignId('tipo_inmuebles_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            // Eliminar la columna 'tipo_inmuebles_id' si se revierte la migración
            $table->dropForeign(['tipo_inmuebles_id']); // Eliminar la relación de clave foránea
            $table->dropColumn('tipo_inmuebles_id');     // Eliminar la columna
        });
    }
}
