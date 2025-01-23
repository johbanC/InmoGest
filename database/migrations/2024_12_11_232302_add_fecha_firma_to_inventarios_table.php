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
        Schema::table('inventarios', function (Blueprint $table) {             
             $table->string('firma_recibe');
             $table->string('foto_recibe');
            $table->string('foto_entrega');
             $table->string('firma_entrega');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventarios', function (Blueprint $table) {
            //
        });
    }
};
