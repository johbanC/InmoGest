<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodigoToInventariosTable extends Migration
{
    public function up()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->string('codigo')->unique()->nullable(); // Agregar el campo 'codigo' como string
        });
    }

    public function down()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropColumn('codigo'); // Eliminar el campo 'codigo' si es necesario revertir la migración
        });
    }
}
