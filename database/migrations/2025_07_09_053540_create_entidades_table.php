<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    // Crea tabla entidades
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre'); // Nombre de la entidad
            $table->string('descripcion')->nullable(); // Descripcion de la entidad opcional
            $table->binary('imagen')->nullable(); // Imagen opcional
        });

        DB::statement('ALTER TABLE entidades MODIFY imagen LONGBLOB NULL');
    }

    // Elimina tabla entidades
    public function down()
    {
        Schema::dropIfExists('entidades');
    }
};
