<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarruselJuegoTable extends Migration
{
    public function up()
    {
        Schema::create('carrusel_juego', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion_imagen', 256);
            $table->foreignId('juego')->constrained('juegos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrusel_juego');
    }
}

