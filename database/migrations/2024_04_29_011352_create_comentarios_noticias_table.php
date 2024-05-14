<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios_noticias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('autor_comentario')->constrained('users');
            $table->foreignId('noticia')->constrained('noticias');
            $table->string('texto_comentario', 2048); // Nombre de columna en minúsculas
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
        Schema::dropIfExists('comentarios_noticias');
    }
}
