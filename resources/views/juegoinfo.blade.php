@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Información del Juego</h1>

        <div class="row">
            <!-- Columna para la imagen, título y valoración -->
            <div class="col-md-5">
                <div class="card">
                    <div class="row g-0">
                        <!-- Imagen del juego -->
                        <div class="col-md-9">
                            <img src="{{ $juego->banner_juego }}" class="card-img-top img-fluid"
                                alt="{{ $juego->nombre_juego }}" style="width: 384px; height: 216px;">
                        </div>
                        <!-- Cuadro de valoración -->
                        <div class="col-md-2 d-flex justify-content-center align-items-center">
    <div class="border border-primary rounded-pill p-2" style="width: 64px; height: 64px;">
        <p class="mb-0" style="color: 
            @if($juego->valoracion_juego < 50)
                red;
            @elseif($juego->valoracion_juego >= 50 && $juego->valoracion_juego <= 70)
                yellow;
            @else
                green;
            @endif font-size: 28px; margin-left: 12px;">
            {{ $juego->valoracion_juego }}
        </p>
    </div>
</div>
                    </div>

                    <!-- Resto de la información -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $juego->nombre_juego }}</h5>
                            <p class="card-text">{{ $juego->descripcion_juego }}</p>
                            <p class="card-text">Fecha de salida:
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $juego->fechasalida_juego)->format('d/m/Y') }}
                            </p>
                            <p class="card-text">Desarrollador: {{ $juego->desarrollador_juego }}</p>
                            @if ($juego->genero_juego)
                                @php
                                    $genero = App\Models\Generojuego::find($juego->genero_juego);
                                @endphp
                                @if ($genero)
                                    <p class="card-text">Género: {{ $genero->nombre }}</p>
                                @endif
                            @endif
                            <div class="card-text"><a href="{{ $juego->link_compra_juego }}">Comprar</a></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Columna para el carrusel de imágenes del juego -->
            <div class="col-md-7">
                <h2 class="mt-4">Imágenes del Juego</h2>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($imagenesJuego as $imagen)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ $imagen->ubicacion_imagen }}" class="d-block w-100"
                                    alt="{{ $juego->nombre_juego }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
        @if (Auth::check())
            <div class="mt-4">
                <h2>Subir Reseña</h2>
                <form action="{{ route('review.submit') }}" method="POST">
                    @csrf
                    <!-- Agregar campo oculto para enviar el ID del juego -->
                    <input type="hidden" name="juego" value="{{ $juego->id }}">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto</label>
                        <textarea class="form-control" id="texto" name="texto" rows="3" maxlength="8192"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_review" class="form-label">Tipo de Valoración</label>
                        <select class="form-select" id="tipo_review" name="tipo_review">
                            @foreach ($tiposValoracion as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre_val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Reseña</button>
                </form>
            </div>
        @else
            <h1>Por favor, inicia sesión para subir una reseña.</h1>
        @endif



        <!-- Reseñas del juego -->
        <div class="row mt-4">
            <h2>Reseñas del Juego</h2>
            <ul class="list-group">
                @foreach ($reviews as $review)
                    <li class="list-group-item d-flex">
                        <!-- Columna izquierda (autor de la reseña) -->
                        <div class="col-3">
                            <div class="d-flex flex-column align-items-center">
                                @foreach ($autores as $autor)
                                    @if ($autor->id === $review->autor_review)
                                        <a href="{{ route('perfil.usuario', ['id' => $autor->id]) }}">
                                            @if ($autor->foto_usuario)
                                                <img src="{{ $autor->foto_usuario }}" alt="{{ $autor->name }}"
                                                    class="img-fluid" style="max-width: 80px;">
                                            @else
                                                <img src="{{ asset('images/defaultuser.png') }}" alt="Usuario sin foto"
                                                    class="img-fluid" style="max-width: 80px;">
                                            @endif
                                            <p>{{ $autor->name }}</p>
                                        </a>
                                        <!-- Mostrar la fecha de publicación (creación) de la reseña -->
                                        <p>{{ $review->created_at->locale('es')->diffForHumans() }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- Columna derecha (tipo de valoración, título y contenido de la reseña) -->
                        <div class="col">
                            <div class="d-flex flex-column">
                                <!-- Imagen y tipo de valoración -->
                                <div class="d-flex align-items-center">
                                    @foreach ($tiposValoracion as $tipo)
                                        @if ($tipo->id === $review->tipo_review)
                                            <img src="{{ asset($tipo->imagen_val) }}" alt="{{ $tipo->nombre_val }}"
                                                style="max-width: 48px;">
                                            <h3>{{ $tipo->nombre_val }}</h3>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- Título y contenido de la reseña -->
                                <div>
                                    <h5>{{ $review->titulo_review }}</h5>
                                    <!-- Aplicar estilos CSS para limitar el tamaño y agregar desbordamiento al texto de la reseña -->
                                    <p style="max-height: 100px; overflow-y: auto;">{{ $review->texto_review }}</p>
                                    <!-- Botón de votación por la reseña -->
                                    <div class="d-flex align-items-center">
                                        <img src="/images/estrella.png" alt="Estrella" style="max-width: 24px;">
                                        <p class="ms-2">{{ $review->estrellas_review }}</p>
                                        <a href="{{ route('review.show', ['id' => $review->id]) }}">Ver reseña</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


    </div>
@endsection
