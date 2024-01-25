@extends('layouts.app')

@section('title', 'Задачи')

@section('content')

    <div class="task">

        <div class="task__container container">

            <div class="task__header">
                <h1 class="task__title">Задачи</h1>
                <a href="{{ route('tasks.create') }}" class="button">Добавить</a>
            </div>

            <ul class="task__categories task-categories">
                <li class="task-categories__item"><a href="{{ route('tasks.index') }}">Все</a></li>
                @foreach($categories as $category)
                    <li class="task-categories__item"><a href="?category={{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>

            <div class="task__list">
                @foreach($tasks as $task)
{{--                    @php--}}
{{--                        $category = \App\Models\TaskCategory::query()->find($task['task_categories_id'])--}}
{{--                    @endphp--}}
                    <div class="task__item">
                        <div class="task__row">
                            <div class="task__image">
                                <img src="{{ $task->getTaskImagePath() }}" alt="Изображение">
                            </div>
                            <div class="task__content">
                                <h3 class="task__name">{{ $task['name'] }}</h3>
                                {{-- <p class="task__category">{{ $category['name'] }}</p> --}}
                                <p class="task__category">{{ $task->category['name'] }}</p>
                                <p class="task__description">{{ $task['description'] }}</p>
                            </div>
                        </div>
                        <div class="task__buttons">
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                @csrf
                                <button class="button" type="submit">Удалить</button>
                            </form>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="button">Редактировать</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

@endsection
