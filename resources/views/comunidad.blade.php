@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Juegos Destacados</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="juegos-container d-flex overflow-auto">
                    @foreach($juegosDestacados as $juego)
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
    </div>
    <div class="row mt-4">
        <h2>Géneros</h2>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($generos as $genero)
                <div class="col-md-2">
                    <form action="{{ route('comunidad.index') }}" method="GET">
                        <input type="hidden" name="id" value="{{ $genero->id }}">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: {{ $genero->color }}">
                            <img src="{{ $genero->imagen }}" class="card-img-top genero-img" alt="{{ $genero->nombre }}">
                            <h6 class="card-title genero-title" style="font-size: 1rem; color: white; font-weight: bold;">{{ $genero->nombre }}</h6>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h2>{{ $nombreGeneroSeleccionado }}</h2>
            @if(empty($juegosPorGenero))
                <h2>Selecciona un género para mostrar los juegos.</h2>
            @else
                <div id="juegos-container" class="juegos-container d-flex overflow-auto">
                    <!-- Aquí se mostrarán los juegos por género -->
                    @foreach($juegosPorGenero as $juego)
                    <div class="col-md-6 col-lg-4 col-xl-2 mb-4">
                        <div class="card juego-card">
                        <a href="{{ route('juego.show', ['nombre' => $juego->nombre_juego]) }}">
                            <img src="{{ $juego->portada_juego }}" class="card-img-top juego-img" alt="{{ $juego->nombre_juego }}">
                            <div class="card-body juego-body">
                                <h3 class="juego-title">{{ $juego->nombre_juego }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <h2>Juegos</h2>
        <div class="row">
            @foreach($todosjuegos as $juego)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $juego->portada_juego }}" class="card-img-top" alt="{{ $juego->nombre_juego }}" style="height: 200px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $juego->nombre_juego }}</h5>
                                    @if ($juego->genero_juego)
                                        @php
                                            $genero = App\Models\Generojuego::find($juego->genero_juego);
                                        @endphp
                                        @if ($genero)
                                            <p class="card-text">Género: {{ $genero->nombre }}</p>
                                        @endif
                                    @endif
                                    <p class="card-text">Valoración: {{ $juego->valoracion_juego }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
