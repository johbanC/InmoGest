<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            // Agregar nuevas columnas
            $table->string('numero_inquilino')->nullable()->after('inquilino');  // Agregar 'numero_inquilino'
            $table->string('email_inquilino')->nullable()->after('numero_inquilino');  // Agregar 'email_inquilino'
            
            // Hacer que ciertas columnas puedan ser null
            $table->string('arrendador')->nullable()->change();
            $table->string('propietario')->nullable()->change();
            //$table->text('descripcion')->nullable()->change();
            $table->string('firma_recibe')->nullable()->change();
            $table->string('foto_recibe')->nullable()->change();
            $table->string('foto_entrega')->nullable()->change();
            $table->string('firma_entrega')->nullable()->change();
            $table->string('nro_llaves')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            // Eliminar las nuevas columnas
            $table->dropColumn('numero_inquilino');
            $table->dropColumn('email_inquilino');
            
            // Revertir cambios en las columnas que permitían nulos
            $table->string('arrendador')->nullable(false)->change();
            $table->string('propietario')->nullable(false)->change();
            $table->text('descripcion')->nullable(false)->change();
            $table->string('firma_recibe')->nullable(false)->change();
            $table->string('foto_recibe')->nullable(false)->change();
            $table->string('foto_entrega')->nullable(false)->change();
            $table->string('firma_entrega')->nullable(false)->change();
            $table->string('nro_llaves')->nullable(false)->change();
        });
    }
}
