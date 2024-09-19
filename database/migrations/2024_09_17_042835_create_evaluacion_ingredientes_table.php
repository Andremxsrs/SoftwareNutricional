<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluacion_ingredientes', function (Blueprint $table) {
            $table->bigIncrements('id');  // ID principal de la tabla
            $table->string('nombre_ingrediente');  // Nombre del ingrediente
            $table->decimal('calidad_nutricional', 5, 2);  // Calidad nutricional con dos decimales
            $table->decimal('cantidad', 10, 2);  // Cantidad en decimal con dos decimales
            $table->unsignedBigInteger('formulacion_id');  // Llave foránea para relacionar con formulacion_nutricional
            $table->timestamps();  // Campos created_at y updated_at automáticos

            // Definir la clave foránea con la tabla formulacion_nutricional
            $table->foreign('formulacion_id')->references('id')->on('formulacion_nutricional')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluacion_ingredientes');
    }
};
