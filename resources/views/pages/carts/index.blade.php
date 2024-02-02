@extends('layouts.app')

@section('content')
    <div class="task">

        <div class="task__container container">

            <div class="task__header">
                <h1 class="task__title">Корзина</h1>
            </div>

            <div class="task__list">
                @if(isset($tasks) && $tasks->count() > 0)
                    @foreach($tasks as $task)
                        @php
                            $order = \App\Models\Order::query()->where('cart_id', $activeCart->id)->where('task_id', $task->id)->first();
                            $count = $order['count'];
                        @endphp
                        <div class="task__item">
                            <div class="task__row">
                                <div class="task__image">
                                    <img src="{{ $task->getTaskImagePath() }}" alt="Изображение">
                                </div>
                                <div class="task__content">
                                    <h3 class="task__name">{{ $task['name'] }}</h3>
                                    <p class="task__category">{{ $task->category['name'] }}</p>
                                    <p class="task__description">{{ $task['description'] }}</p>
                                    <p class="task__description">Цена: {{ $task['price'] }}</p>
                                    <div class="task__count">
                                        <form action="{{ route('orders.minus', $order->id) }}" method="post">
                                            @csrf
                                            <button class="button" type="submit">-</button>
                                        </form>
                                        <p class="button">{{ $count }}</p>
                                        <form action="{{ route('orders.plus', $order->id) }}" method="post">
                                            @csrf
                                            <button class="button" type="submit">+</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="task__buttons">
                                <form action="{{ route('cart.task.destroy', [$activeCart->id, $task->id]) }}" method="post">
                                    @csrf
                                    <button class="button" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <form action="{{ route('cart.destroy', $activeCart->id) }}" method="post">
                        @csrf
                        <button class="button" type="submit">Очистить корзину</button>
                    </form>
                    <h2>Итоговая цена: {{ $total }}</h2>
                    <form action="{{ route('carts.checkout', $activeCart->id) }}" method="post">
                        @csrf
                        <button class="button" type="submit">Оформить заказ</button>
                    </form>
                @else
                    Ваша корзина пуста :(
                @endif
            </div>

        </div>

    </div>
@endsection
