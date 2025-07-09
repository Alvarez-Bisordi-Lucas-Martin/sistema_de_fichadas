<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crea tabla tokens
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('producto_id')->constrained()->onDelete('cascade'); // FK producto, elimina en cascada
            $table->string('token', 64)->unique(); // Token unico
            $table->timestamp('expires_at')->nullable(); // Expiracion opcional
        });
    }

    // Elimina tabla tokens
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
};
