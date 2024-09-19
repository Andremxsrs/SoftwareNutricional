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
            // Campos para la formulación
            if (!Schema::hasColumn('reportes_monitoreos', 'formulacion_nombre')) {
                $table->string('formulacion_nombre')->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'formulacion_descripcion')) {
                $table->text('formulacion_descripcion')->nullable();
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'ingredientes_evaluados')) {
                $table->json('ingredientes_evaluados')->nullable();
            }

            // Campos para el control de calidad y sugerencias
            if (!Schema::hasColumn('reportes_monitoreos', 'crecimiento_predicho')) {
                $table->decimal('crecimiento_predicho', 5, 2)->nullable();  // Crecimiento predicho
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'rendimiento_predicho')) {
                $table->decimal('rendimiento_predicho', 5, 2)->nullable();  // Rendimiento predicho
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'cumple_estandares')) {
                $table->boolean('cumple_estandares')->nullable();  // Cumple con los estándares
            }
            if (!Schema::hasColumn('reportes_monitoreos', 'resultado_control')) {
                $table->string('resultado_control')->nullable();  // Resultado del control
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
            // En caso de revertir la migración, aquí se eliminan los campos
            $table->dropColumn([
                'formulacion_nombre',
                'formulacion_descripcion',
                'ingredientes_evaluados',
                'crecimiento_predicho',
                'rendimiento_predicho',
                'cumple_estandares',
                'resultado_control',
                'observaciones',
                'costo_total',
                'sugerencias_optimizacion',
            ]);
        });
    }
};
