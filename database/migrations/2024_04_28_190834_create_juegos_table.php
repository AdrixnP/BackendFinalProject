<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_juego', 64);
            $table->unsignedTinyInteger('valoracion_juego');
            $table->string('descripcion_juego', 512);
            $table->string('portada_juego', 256);
            $table->dateTime('fechasalida_juego');
            $table->string('desarrollador_juego', 50);
            $table->string('genero_juego', 50);
            $table->string('link_compra_juego', 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juegos');
    }
}

