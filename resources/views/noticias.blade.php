<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Carrusel de las primeras 8 noticias -->
            <h2 class="text-center">Noticias destacadas</h2>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach($noticiasRestantes as $noticia)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ $noticia->portada_noticia }}" class="d-block w-100" alt="{{ $noticia->titulo_noticia }}">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>{{ $noticia->titulo_noticia }}</h5>
                      <p>{{ $noticia->resumen_noticia }}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <!-- Noticias restantes en dos columnas -->
            <h2 class="text-center">Noticias publicadas</h2>
            <div class="row mt-4">
                @foreach($noticiasRestantes as $noticia)
                <div class="col-md-6">
                        <div class="card noticia-card">
                        <img src="{{ $noticia->portada_noticia}}" class="card-img-top noticia-img" alt="...">
                        <div class="card-body noticia-body">
                            <h3 class="noticia-title">{{ $noticia->titulo_noticia}}</notititle>
                            <h5 class="card-text">{{ $noticia->autor_noticia}}</h5>
                            <p class="card-text">{{ $noticia->resumen_noticia}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
