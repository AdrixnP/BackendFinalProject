<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('autor_noticia', 64);
            $table->string('titulo_noticia', 128)->nullable();
            $table->string('portada_noticia', 256);
            $table->string('texto_noticia', 4096);
            $table->timestamp('horapublicación_noticia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
