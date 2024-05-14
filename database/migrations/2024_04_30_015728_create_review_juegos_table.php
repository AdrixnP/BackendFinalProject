<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('review_juegos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('autor_review')->constrained('users');
            $table->foreignId('juego')->constrained('juegos');
            $table->string('titulo_review', 128);
            $table->string('texto_review', 4096);
            $table->foreignId('tipo_review')->constrained('tipo_valoracions');
            $table->unsignedInteger('estrellas_review');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_juegos');
    }
};
