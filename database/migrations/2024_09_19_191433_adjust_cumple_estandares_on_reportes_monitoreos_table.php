<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            // Cambiar el tipo de columna a boolean y permitir nulos
            $table->boolean('cumple_estandares')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            // Revertir a la configuración original si es necesario
            // $table->integer('cumple_estandares')->nullable(false)->change(); // Ajustar según la configuración original
        });
    }
};
