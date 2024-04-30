<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioNoticia extends Model
{
    use HasFactory;

    protected $table = 'comentarios_noticias';

    protected $fillable = [
        'autor_comentario',
        'noticia',
        'texto_comentario',
    ];
}
