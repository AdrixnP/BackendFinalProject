<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ("css/app.css") }}">
</head>

<body>
    <nav class="navnormal">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('welcome') }}">
                <div class="align-items-center">
                    <img src="{{ asset('images/logow.png') }}" alt="Normal Smoke" width="200" height="80">
                </div>
            </a>

            <div class="viewlinks">
                <a href="{{ route('noticias.index') }}">Noticias</a>
                <a href="{{ route('comunidad.index') }}">Comunidad</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </div>
            <div class="user-links">
                <a href="#">Iniciar Sesión</a>
                <a href="#">Perfil</a>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
