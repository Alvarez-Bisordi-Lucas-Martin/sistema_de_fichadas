<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla productos
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre'); // Nombre del producto
            $table->string('descripcion')->nullable(); // Descripcion del producto opcional
            $table->foreignId('entidad_id')->constrained('entidades')->onDelete('cascade'); // FK entidad con eliminacion en cascada
        });
    }

    // Elimina tabla productos
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
