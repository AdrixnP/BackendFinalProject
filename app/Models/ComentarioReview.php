<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioReview extends Model
{
    use HasFactory;

    protected $table = 'comentario_review';

    protected $fillable = [
        'autor_comentario',
        'review_id',
        'texto_comentario',
    ];
}
