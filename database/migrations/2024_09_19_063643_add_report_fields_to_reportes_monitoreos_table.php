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
            if (!Schema::hasColumn('reportes_monitoreos', 'formulacion_nombre')) {
                $table->string('formulacion_nombre')->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'formulacion_descripcion')) {
                $table->text('formulacion_descripcion')->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'ingredientes_evaluados')) {
                $table->json('ingredientes_evaluados')->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'observaciones')) {
                $table->text('observaciones')->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'costo_total')) {
                $table->decimal('costo_total', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'sugerencias_optimizacion')) {
                $table->text('sugerencias_optimizacion')->nullable();
            }
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            //
        });
    }
};
