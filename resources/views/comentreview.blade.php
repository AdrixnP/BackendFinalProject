@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item d-flex">
            <!-- Columna izquierda (autor de la reseña) -->
            <div class="col-3">
                <div class="d-flex flex-column align-items-center">
                    <!-- Mostrar la imagen del autor de la reseña -->
                    @foreach ($autoresResenas as $autorResena)
                        @if ($autorResena->foto_usuario)
                            <img src="{{ $autorResena->foto_usuario }}" alt="{{ $autorResena->name }}" class="img-fluid" style="max-width: 96px;">
                        @else
                            <img src="{{ asset('images/defaultuser.png') }}" alt="Usuario sin foto" class="img-fluid" style="max-width: 96px;">
                        @endif
                        <p>{{ $autorResena->name }}</p>
                        <!-- Mostrar la fecha de publicación de la reseña -->
                        <p>{{ $review->created_at->locale('es')->diffForHumans() }}</p>
                    @endforeach
                </div>
            </div>
            <!-- Columna derecha (tipo de valoración, título y contenido de la reseña) -->
            <div class="col">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center">
                        @foreach($tiposValoracion as $tipo)
                            @if($tipo->id === $review->tipo_review)
                                <img src="{{ asset($tipo->imagen_val) }}" alt="{{ $tipo->nombre_val }}" style="max-width: 48px;">
                                <p>{{ $tipo->nombre_val }}</p>
                            @endif
                        @endforeach
                    </div>
                    <!-- Mostrar el título y el contenido de la reseña -->
                    <h5>{{ $review->titulo_review }}</h5>
                    <p>{{ $review->texto_review }}</p>
                    <!-- Botón de votación por la reseña -->
                    <div class="d-flex align-items-center">
                        <img src="/images/estrella.png" alt="Estrella" style="max-width: 24px;">
                        <p class="ms-2">{{ $review->estrellas_review }}</p>
                    </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
<!-- Mostrar los comentarios -->
<!-- Mostrar los comentarios -->
<h2>Comentarios</h2>
@foreach ($comentarios as $comentario)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    @php
                        // Obtener el autor del comentario actual
                        $autorComentario = $autoresComentarios->where('id', $comentario->autor_comentario)->first();
                    @endphp

                    @if ($autorComentario)
                        @if ($autorComentario->foto_usuario)
                            <img src="{{ $autorComentario->foto_usuario }}" alt="{{ $autorComentario->name }}" class="img-fluid" style="max-width: 80px;">
                        @else
                            <img src="{{ asset('images/defaultuser.png') }}" alt="Usuario sin foto" class="img-fluid" style="max-width: 80px;">
                        @endif
                        <p class="card-title">{{ $autorComentario->name }}</p>
                    @endif
                </div>
                <div class="col-md-8">
                    <p class="card-text">{{ $comentario->Texto_comentario }}</p>
                    <p class="card-text">{{ $comentario->created_at->locale('es')->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if (Auth::check())
    <form action="{{ route('comentario.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="review_id" value="{{ $review->id }}">
        <div class="mb-3">
            <label for="texto" class="form-label">Comentario</label>
            <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Comentario</button>
    </form>
@else
    <h1>Por favor, inicia sesión para dejar un comentario.</h1>
@endif

</div>
@endsection
