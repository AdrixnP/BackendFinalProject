@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Columna izquierda -->
            <div class="col-md-4 text-center" style="font-family: Arial, sans-serif; color: #ff69ac; background-color: #911335; padding: 20px; border-radius: 8px;">
    @if ($usuario->foto_usuario)
        <img src="{{ $usuario->foto_usuario }}" alt="{{ $usuario->name }}" class="img-fluid mb-3"
            style="max-width: 150px;" class="user-avatar">
    @else
        <img src="{{ asset('images/defaultuser.png') }}" alt="Usuario sin foto" class="img-fluid mb-3"
            style="max-width: 150px;" class="user-avatar">
    @endif
    <h2 style="font-size: 28px; font-weight: bold; color:#ff69ac">{{ $usuario->name }}</h2>
    <p style="font-size: 18px; color: white;">Fecha de registro: {{ $usuario->created_at->format('d/m/Y') }}</p>
    <p style="font-size: 18px; color: white;">Cantidad de reseñas: {{ $reseñas->count() }}</p>
</div>

            <!-- Columna derecha -->
            <div class="col-md-8">
                <div class="mt-4">
                    <h3>Reseñas de juegos</h3>
                    @if ($reseñas->isEmpty())
                        <p>No hay reseñas de juegos para este usuario.</p>
                    @else
                        <div class="row">
                            @foreach ($reseñas as $review)
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Información de la reseña -->
                                                <div class="col-md-8">
                                                    <div class="d-flex flex-column">
                                                        <!-- Imagen y tipo de valoración -->
                                                        <div class="d-flex align-items-center mb-2">
                                                            @foreach ($tiposValoracion as $tipo)
                                                                @if ($tipo->id === $review->tipo_review)
                                                                    <img src="{{ asset($tipo->imagen_val) }}"
                                                                        alt="{{ $tipo->nombre_val }}"
                                                                        style="max-width: 48px;">
                                                                    <h3 class="ms-2 mb-0">{{ $tipo->nombre_val }}</h3>
                                                                @endif
                                                            @endforeach
                                                            <p style="color: white;">.....</p>
                                                            <p style="font-style: italic; text-align: right; margin-right: 20px;">{{ $review->created_at->locale('es')->diffForHumans() }}</p>
                                                        </div>
                                                        <!-- Título y contenido de la reseña -->
                                                        <div>
                                                            <h5>{{ $review->titulo_review }}</h5>
                                                            <p style="max-height: 100px; overflow-y: auto;">
                                                                {{ $review->texto_review }}</p>
                                                            <!-- Botón de votación por la reseña -->
                                                            <div class="d-flex align-items-center">
                                                                <img src="/images/estrella.png" alt="Estrella"
                                                                    style="max-width: 24px;">
                                                                <p class="ms-2 mb-0">{{ $review->estrellas_review }}</p>
                                                                <a href="{{ route('review.show', ['id' => $review->id]) }}"
                                                                    class="ms-3">Ver reseña</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Imagen del juego -->
                                                <div class="col-md-4">
                                                    @php
                                                        $juego = $juegos->firstWhere('id', $review->juego);
                                                    @endphp
                                                    @if ($juego)
                                                        <div class="card juegoperfil-card">
                                                            <a
                                                                href="{{ route('juego.show', ['nombre' => $juego->nombre_juego]) }}">
                                                                <img src="{{ $juego->banner_juego }}"
                                                                    class="card-img-top juegoperfil-img"
                                                                    alt="{{ $juego->nombre_juego }}">
                                                                <div class="card-body juego-body">
                                                                    <p class="juegoperfil-title">{{ $juego->nombre_juego }}
                                                                    </p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
