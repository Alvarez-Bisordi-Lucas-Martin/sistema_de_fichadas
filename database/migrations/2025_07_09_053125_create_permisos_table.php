<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla permisos
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('modelo'); // Modelo asociado al permiso
            $table->string('accion'); // Accion permitida
        });
    }

    // Elimina tabla permisos
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
};
