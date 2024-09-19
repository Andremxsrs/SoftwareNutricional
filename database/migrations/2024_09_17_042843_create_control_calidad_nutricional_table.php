<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('control_calidad_nutricionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formulacion_id');
            $table->string('resultado_control');
            $table->boolean('cumple_estandares');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('formulacion_id')->references('id')->on('formulacion_nutricionals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('control_calidad_nutricionals');
    }
};
