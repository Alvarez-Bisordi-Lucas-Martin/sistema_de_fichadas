<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla pivote grupo_usuario
    public function up()
    {
        Schema::create('grupo_usuario', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('grupo_id')->constrained()->onDelete('cascade'); // FK grupo con eliminacion en cascada
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // FK usuario con eliminacion en cascada
        });
    }

    // Elimina tabla grupo_usuario
    public function down()
    {
        Schema::dropIfExists('grupo_usuario');
    }
};
