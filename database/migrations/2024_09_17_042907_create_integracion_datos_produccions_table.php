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
        Schema::create('integracion_datos_produccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_fuente')->nullable();
            $table->text('datos_produccion')->nullable();
            $table->timestamp('fecha_integracion')->useCurrent();
            $table->unsignedBigInteger('formulacion_id');

            // Definición de la clave foránea
            $table->foreign('formulacion_id')->references('id')->on('formulacion_nutricional')->onDelete('cascade');

            $table->timestamps();  // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integracion_datos_produccions');
    }
};
