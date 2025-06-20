<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('celular')->nullable()->after('email');
            $table->string('token_privado')->nullable()->after('id');
            $table->string('token_publico')->nullable()->after('token_privado');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['celular', 'token_privado', 'token_publico']);
        });
    }
};