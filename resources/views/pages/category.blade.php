@extends('layouts.app')

@section('title', 'Категории')

@section('content')

<div class="category">

    <div class="category__container container">

        <h1>Категории</h1>

        <form action="" method="post" class="category__form">
            @csrf
            <input class="default-input" type="text" name="name" placeholder="Название категории">
            <button type="submit" class="button">Добавить</button>
        </form>

        <ul class="category__list">
            <li class="category__item">Категория 1</li>
        </ul>

    </div>


</div>

@endsection('content')