@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Juegos Destacados</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="juegos-container d-flex overflow-auto">
                        @foreach ($juegos as $juego)
                            <div class="col-md-6 col-lg-4 col-xl-2 mb-4">
                                <div class="card juego-card">
                                    <a href="{{ route('juego.show', ['nombre' => $juego->nombre_juego]) }}">
                                        <img src="{{ $juego->portada_juego }}" class="card-img-top juego-img" alt="...">
                                        <div class="card-body juego-body">
                                            <h3 class="juego-title">{{ $juego->nombre_juego }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <h1>Noticias publicadas</h1>
            <div class="row mt-4">
                @foreach ($noticias as $noticia)
                    <div class="col-md-6">
                        <a href="{{ route('news.show', ['id' => $noticia->id]) }}" class="card-link">
                            <div class="card noticia-card">
                                <img src="{{ $noticia->portada_noticia }}" class="card-img-top noticia-img" alt="...">
                                <div class="card-body noticia-body">
                                    <h3 class="noticia-title">{{ $noticia->titulo_noticia }}</h3>
                                    <h5 class="card-text">{{ $noticia->autor_noticia }}</h5>
                                    <p class="card-text">{{ $noticia->resumen_noticia }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection
