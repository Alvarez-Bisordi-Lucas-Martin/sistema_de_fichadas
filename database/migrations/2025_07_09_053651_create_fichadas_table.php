<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla fichadas
    public function up()
    {
        Schema::create('fichadas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('fecha_hora'); // Fecha y hora de fichada
            $table->enum('tipo', ['entrada', 'salida']); // Tipo de fichada
            $table->binary('imagen')->nullable(); // Imagen opcional
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // FK producto con eliminacion en cascada
        });
    }

    // Elimina tabla fichadas
    public function down()
    {
        Schema::dropIfExists('fichadas');
    }
};
