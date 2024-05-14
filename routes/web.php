<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ComentariosReviewController;
use App\Http\Controllers\VerNoticiaController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{id}', [VerNoticiaController::class, 'show'])->name('news.show');

Route::get('/comunidad', [ComunidadController::class, 'index'])->name('comunidad.index');
Route::get('/comunidad/{nombre}', [JuegoController::class, 'show'])->name('juego.show');
Route::post('/review/submit', [ReviewController::class, 'submit'])->name('review.submit');

Route::get('/comunidad/reviews/{id}', [ReviewController::class, 'show'])->name('review.show');
Route::post('/comentario/submit', [ComentariosReviewController::class, 'submitComentario'])->name('comentario.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
