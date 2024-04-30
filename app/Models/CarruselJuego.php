<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarruselJuego extends Model
{
    use HasFactory;

    protected $table = 'carrusel_juego';

    protected $fillable = [
        'ubicacion_imagen',
        'juego',
    ];
}
