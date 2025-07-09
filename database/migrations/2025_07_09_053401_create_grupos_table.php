<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla grupos
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre'); // Nombre del grupo
        });
    }

    // Elimina tabla grupos
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
};
