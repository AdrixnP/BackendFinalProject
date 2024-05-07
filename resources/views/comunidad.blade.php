<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Juegos Destacados</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="juegos-container d-flex overflow-auto">
                    <!-- Tarjetas de juegos aquí -->
                    @foreach($juegosDestacados as $juego)
                    <div class="col-md-6 col-lg-4 col-xl-2 mb-4">
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
        </div>
    </div>
</div>
@endsection
