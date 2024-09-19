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
        Schema::create('reportes_monitoreos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_reporte');
            $table->text('datos_reporte')->nullable();
            $table->timestamp('fecha_reporte')->useCurrent();
            $table->unsignedBigInteger('simulacion_id');

            // Definición de la clave foránea
            $table->foreign('simulacion_id')->references('id')->on('simulacion_crecimiento_rendimientos')->onDelete('cascade');

            $table->timestamps();  // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_monitoreos');
    }
};
