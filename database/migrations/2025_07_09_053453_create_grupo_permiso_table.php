<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla pivote grupo_permiso
    public function up()
    {
        Schema::create('grupo_permiso', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('grupo_id')->constrained()->onDelete('cascade'); // FK grupo con eliminacion en cascada
            $table->foreignId('permiso_id')->constrained('permisos')->onDelete('cascade'); // FK permiso con eliminacion en cascada
        });
    }

    // Elimina tabla grupo_permiso
    public function down()
    {
        Schema::dropIfExists('grupo_permiso');
    }
};
