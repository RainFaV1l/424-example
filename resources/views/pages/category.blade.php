@extends('layouts.app')

@section('title', 'Категории')

@section('content')

<div class="category">

    <div class="category__container container">

        <h1>Категории</h1>

        <form action="{{ route('category.store') }}" method="post" class="category__form">
            @csrf
            <input class="default-input" type="text" name="name" placeholder="Название категории">
            <label class="error-text">
                @error('name') {{ $message }}  @enderror
            </label>
            <button type="submit" class="button">Добавить</button>
        </form>

        <ul class="category__list">
            @foreach($categories as $category)
                <div class="category__item">
                    <li>
                        {{ $category->name }}
                    </li>
                    <div class="category__buttons">
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            <button class="button" type="submit">Удалить</button>
                        </form>
                        <a href="{{ route('category.edit', $category->id) }}" class="button">Редактировать</a>
                    </div>
                </div>
            @endforeach
        </ul>

    </div>


</div>

@endsection('content')
