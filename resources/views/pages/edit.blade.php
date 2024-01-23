@extends('layouts.app')

@section('title', 'Редактирование')

@section('content')
    <div class="login">
        <div class="login__container container">
            <h1>Редактирование</h1>
            <form action="{{ route('category.update', $category->id) }}" method="post" class="login__form">
                @csrf
                <input class="default-input" type="text" name="name" placeholder="Название" value="{{ $category->name }}">
                <label class="error-text">
                    @error('name') {{ $message }}  @enderror
                </label>
                <button type="submit" class="button">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
