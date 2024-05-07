<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ComunidadController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');

Route::get('/comunidad', [ComunidadController::class, 'index'])->name('comunidad.index');
