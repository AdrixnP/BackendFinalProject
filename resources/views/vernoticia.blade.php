@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $noticia->titulo_noticia }}</h2>
                <p>Publicado por: {{ $noticia->autor_noticia }}</p>
                <p>Fecha de publicación: {{ \Carbon\Carbon::parse($noticia->horapublicación_noticia)->format('d/m/Y') }}</p>

                <div class="mb-3">
                    <img src="{{ $noticia->portada_noticia }}" class="img-fluid" alt="{{ $noticia->titulo_noticia }}">
                </div>
                <p>{{ $noticia->texto_noticia }}</p>
            </div>
        </div>
    </div>
@endsection
