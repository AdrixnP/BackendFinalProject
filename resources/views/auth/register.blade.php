@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 400px; background-color: #f0f0f0; padding: 20px; border-radius: 8px;">
    <form method="POST" action="{{ route('register') }}" class="mt-4">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group mt-4">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-4">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 underline">{{ __('Already registered?') }}</a>
            <button type="submit" class="btn btn-primary ms-4">{{ __('Register') }}</button>
        </div>
    </form>
</div>
@endsection
