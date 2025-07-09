<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla entidades
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre'); // Nombre de la entidad
            $table->string('descripcion'); // Descripcion de la entidad
            $table->binary('imagen')->nullable(); // Imagen opcional
        });
    }

    // Elimina tabla entidades
    public function down()
    {
        Schema::dropIfExists('entidades');
    }
};
