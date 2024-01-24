@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="start-page">
        <div class="start-page__container container">
            <div class="start-page__header">
                <h1 class="start-page__title">Задачник</h1>
                <p class="start-page__subtitle">Записывайте и выполняйте задачи вместе с нами!</p>
            </div>
            <div class="start-page__content start-page-content">
                <div class="start-page-content__image">
                    <img src="{{ asset('public/assets/images/index.jpeg') }}" alt="image">
                </div>
            </div>
        </div>
    </div>
@endsection
