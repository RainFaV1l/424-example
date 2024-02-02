@extends('layouts.app')

@section('content')
    <div class="task">

        <div class="task__container container">

            <div class="task__header">
                <h1 class="task__title">История заказов</h1>
            </div>

            <div class="task__list">
                @if(isset($carts) && $carts->count() > 0)
                    @foreach($carts as $cart)
                        <div>
                            <h3>Заказ №{{ $cart->id }}</h3>
                            @foreach($cart->tasks as $task)
                                @php
                                    $order = \App\Models\Order::query()->where('cart_id', $cart->id)->where('task_id', $task->id)->first();
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
                                            <p class="button">Количество: {{ $count }}</p>
                                        </div>
                                    </div>
                                    <div class="task__buttons">
                                        <form action="{{ route('cart.task.destroy', [$cart->id, $task->id]) }}" method="post">
                                            @csrf
                                            <button class="button" type="submit">Отменить</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @else
                    У вас нет заказов :(
                @endif
            </div>

        </div>

    </div>
@endsection
