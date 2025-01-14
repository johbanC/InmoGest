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
        Schema::table('fotos', function (Blueprint $table) {
            $table->string('codigo')->nullable()->after('id'); //codigo que se trae de la tabla inventario
            $table->string('carpeta')->nullable()->after('codigo'); //saber el nombre de la carpeta donde se guardan las fotos que seria con el codigo del inventario
            $table->string('tipo')->nullable()->after('carpeta'); //seria para saber que las fotos son de un inventario o de un inmueble


        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->dropColumn('codigo');  
            $table->dropColumn('carpeta');
            $table->dropColumn('tipo');
        });
    }
};
