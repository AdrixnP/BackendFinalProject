<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoValoracion extends Model
{
    use HasFactory;

    protected $table = 'tipo_valoracions';

    protected $fillable = [
        'nombre_val',
        'imagen_val',
    ];
}
