@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; background-color: #f0f0f0; padding: 20px; border-radius: 8px;">
    <!-- Session Status -->
    <div class="mb-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mt-4">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Recuerdame') }}</label>
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Iniciar sesión') }}</button>
        </div>
    </form>

    <div class="mt-4">
        <p class="text-sm text-gray-600">
            {{ __("¿No tienes una cuenta?") }} <a href="{{ route('register') }}" class="text-indigo-600">{{ __('Crea una') }}</a>
        </p>
    </div>
</div>
@endsection
