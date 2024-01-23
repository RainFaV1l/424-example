@extends('layouts.app')

<!-- @section('title') Авторизация @endsection('title') -->
@section('title', 'Авторизация')

@section('content')
    <div class="login">
        <div class="login__container container">
            <h1>Авторизация</h1>
            <form action="{{ route('user.login') }}" method="post" class="login__form">
                @csrf
                <input class="default-input" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                <label class="error-text">
                    @error('email') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="text" name="password" placeholder="Пароль">
                <label class="error-text">
                    @error('password') {{ $message }}  @enderror
                </label>
                <label class="error-text">
                    @error('invalid_password') {{ $message }}  @enderror
                </label>
                <button type="submit" class="button">Войти</button>
            </form>
        </div>
    </div>
@endsection
