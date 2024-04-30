<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center m-5">Bienvenida</h1>

        <!-- Sección de noticias -->
        <h2 class="text-center">Noticias Recientes</h2>
        <div class="row">
            @foreach($noticias as $noticia)
                <div class="col-md-4 mb-4">
                    <div class="card noticia-card">
                        <img src="{{ $noticia->portada_noticia}}" class="card-img-top noticia-img" alt="...">
                        <div class="card-body noticia-body">
                            <h3 class="noticia-title">{{ $noticia->titulo_noticia}}</notititle>
                            <h5 class="card-text">{{ $noticia->autor_noticia}}</h5>
                            <p class="card-text">{{ $noticia->texto_noticia}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Sección de juegos con más valoración -->
        <h2 class="text-center mt-5">Juegos populares</h2>
        <div class="row">
            @foreach($juegos as $juego)
                <div class="col-md-6 col-lg-4 col-xl-2 mb-4"> <!-- Utiliza col-xl-2 para dispositivos extra grandes -->
                    <div class="card juego-card">
                        <img src="{{ $juego->portada_juego }}" class="card-img-top juego-img" alt="...">
                        <div class="card-body juego-body">
                            <h3 class="juego-title">{{ $juego->nombre_juego}}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
