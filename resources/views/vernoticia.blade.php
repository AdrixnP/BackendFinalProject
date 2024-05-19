@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $noticia->titulo_noticia }}</h1>
                <p>Publicado por: {{ $noticia->autor_noticia }}</p>
                <p>Fecha de publicación: {{ \Carbon\Carbon::parse($noticia->horapublicación_noticia)->format('d/m/Y') }}</p>

                <div class="mb-3">
                    <img src="{{ $noticia->portada_noticia }}" class="img-fluid" alt="{{ $noticia->titulo_noticia }}">
                </div>
                <p>{{ $noticia->texto_noticia }}</p>
            </div>
        </div>
        <h3>Comentarios</h3>
        @foreach ($comentarios as $comentario)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            @php
                                // Obtener el autor del comentario actual
                                $autorComentario = $autoresComentarios
                                    ->where('id', $comentario->autor_comentario)
                                    ->first();
                            @endphp

                            @if ($autorComentario)
                                @if ($autorComentario->foto_usuario)
                                    <img src="{{ $autorComentario->foto_usuario }}" alt="{{ $autorComentario->name }}"
                                        class="img-fluid" style="max-width: 80px;">
                                @else
                                    <img src="{{ asset('images/defaultuser.png') }}" alt="Usuario sin foto"
                                        class="img-fluid" style="max-width: 80px;">
                                @endif
                                <p class="card-title">{{ $autorComentario->name }}</p>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">{{ $comentario->texto_comentario }}</p>
                            <p class="card-text">{{ $comentario->created_at->locale('es')->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if (Auth::check())
            <form action="{{ route('comentario.submit.noticia') }}" method="POST">
                @csrf
                <input type="hidden" name="noticia" value="{{ $noticia->id }}">
                <div class="mb-3">
                    <label for="texto" class="form-label">Comentario</label>
                    <textarea class="form-control" id="texto" name="texto" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Comentario</button>
            </form>
        @else
            <h5>Por favor, inicia sesión para dejar un comentario.</h5>
        @endif
    </div>
@endsection
