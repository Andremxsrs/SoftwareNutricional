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
        Schema::create('optimizacion_costos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('costo_total', 10, 2)->nullable();
            $table->timestamp('fecha_optimizacion')->useCurrent();
            $table->unsignedBigInteger('formulacion_id');
            $table->softDeletes();
            $table->text('sugerencias')->nullable();
            // Definición de la clave foránea
            $table->foreign('formulacion_id')->references('id')->on('formulacion_nutricional')->onDelete('cascade');

            $table->timestamps();  // Añadir `created_at` y `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('optimizacion_costos', function (Blueprint $table) {
            $table->dropSoftDeletes();  // Eliminar la columna `deleted_at`
            $table->dropColumn('sugerencias');
        });

        Schema::dropIfExists('optimizacion_costos');  // Eliminar la tabla si existe
    }
};
