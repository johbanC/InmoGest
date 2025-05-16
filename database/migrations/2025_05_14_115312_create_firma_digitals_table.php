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
        Schema::create('firma_digitals', function (Blueprint $table) {
            $table->id();
            $table->morphs('documentable');

            // Datos del firmante
            $table->string('rol_firmante', 50);
            $table->string('nombre_firmante');
            $table->string('tipo_documento_firmante', 20); // Nuevo
            $table->string('numero_documento_firmante', 30); // Nuevo

            // Archivos
            $table->string('firma_digital_path');
            $table->text('firma_digital_base64')->nullable(); // Nuevo
            $table->text('json_base64')->nullable(); // con este json vamos a poder probar como se general el hash de validacion
            $table->string('foto_firmante_path')->nullable();

            // Seguridad
            $table->string('ip_address', 45);
            $table->string('hash_validacion', 64);
            $table->json('dispositivo')->nullable();

            // Validación
            $table->boolean('consentimiento')->default(false);
            $table->json('snapshot_data')->nullable();
            $table->timestamp('fecha_firma')->useCurrent(); // Nuevo

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firma_digitals');
    }
};
