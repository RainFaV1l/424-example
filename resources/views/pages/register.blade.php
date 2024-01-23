@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="login">
        <div class="login__container container">
            <h1>Регистрация</h1>
            @if($errors->all())
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <form action="{{ route('user.register') }}" method="post" class="login__form">
                @csrf
                <input class="default-input" type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
                <label class="error-text">
                    @error('name') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') }}">
                <label class="error-text">
                    @error('surname') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                <label class="error-text">
                    @error('email') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="password" name="password" placeholder="Пароль">
                <label class="error-text">
                    @error('password') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="password" name="password_r" placeholder="Повторите пароль">
                <button type="submit" class="button">Создать</button>
            </form>
        </div>
    </div>
@endsection
