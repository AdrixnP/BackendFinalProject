<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
                <a href="{{ route('noticias.index') }}" style="color: white; font-weight: bold; font-family: Arial, sans-serif; font-size: 18px;">Noticias</a>
                <a> --- </a>
                <a href="{{ route('comunidad.index') }}" style="color: white; font-weight: bold; font-family: Arial, sans-serif; font-size: 18px;">Comunidad</a>
            </div>
            <div class="search-bar">
                <form action="{{ route('buscar') }}" method="GET">
                    <input type="text" name="q" placeholder="Buscar...">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <div class="user-links">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-4">
                                    <img src="{{ Auth::user()->foto_usuario ? Auth::user()->foto_usuario : asset('images/defaultuser.png') }}"
                                        alt="Foto de perfil" class="user-avatar">
                                    <span class="text-sm text-gray-700 dark:text-gray-500">{{ Auth::user()->name }}</span>
                                </a>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
