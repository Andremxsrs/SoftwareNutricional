<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            // Cambiar el campo cumple_estandares a booleano y establecer un valor por defecto
            $table->boolean('cumple_estandares')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('reportes_monitoreos', function (Blueprint $table) {
            // Cambiar de vuelta a tipo nullable si es necesario
            $table->boolean('cumple_estandares')->nullable()->change();
        });
    }
};
