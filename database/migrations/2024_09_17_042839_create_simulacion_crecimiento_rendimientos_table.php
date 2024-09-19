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
        Schema::create('simulacion_crecimiento_rendimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_simulacion')->nullable(false); // Asegúrate de que no sea nulo
            $table->decimal('crecimiento_predicho', 5, 2)->nullable(); // Deja como nullable si no siempre hay datos
            $table->decimal('rendimiento_predicho', 5, 2)->nullable(); // Igual aquí
            $table->timestamp('fecha_simulacion')->useCurrent(); // Campo con valor actual por defecto
            $table->unsignedBigInteger('formulacion_id');

            // Clave foránea a la tabla formulacion_nutricional
            $table->foreign('formulacion_id')
                  ->references('id')->on('formulacion_nutricional')
                  ->onDelete('cascade')  // Elimina las simulaciones si la formulación es eliminada
                  ->onUpdate('cascade'); // Actualiza las referencias si cambia la clave primaria en formulacion_nutricional

            $table->timestamps();  // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulacion_crecimiento_rendimientos');
    }
};
