<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewJuego extends Model
{
    use HasFactory;

    protected $table = 'review_juegos';

    protected $fillable = [
        'autor_review',
        'juego',
        'titulo_review',
        'texto_review',
        'tipo_review',
        'estrellas_review',
    ];
}
