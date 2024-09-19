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
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            // Cambiar el tipo de la columna a JSON
            $table->json('ingredientes_evaluados')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            // Revertir el cambio si es necesario (volver a texto o lo que era antes)
            $table->text('ingredientes_evaluados')->change();
        });
    }
};
