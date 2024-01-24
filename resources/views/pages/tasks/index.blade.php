@extends('layouts.app')

@section('title', 'Задачи')

@section('content')

    <div class="task">

        <div class="task__container container">

            <div class="task__header">
                <h1 class="task__title">Задачи</h1>
                <a href="{{ route('tasks.create') }}" class="button">Добавить</a>
            </div>

            <div class="task__list">
                @foreach($tasks as $task)
{{--                    @php--}}
{{--                        $category = \App\Models\TaskCategory::query()->find($task['task_categories_id'])--}}
{{--                    @endphp--}}
                    <div class="task__item">
                        <div class="task__image">
                            <img src="{{ $task->getTaskImagePath() }}" alt="Изображение">
                        </div>
                        <div class="task__content">
                            <h3 class="task__name">{{ $task['name'] }}</h3>
{{--                            <p class="task__category">{{ $category['name'] }}</p>--}}
                            <p class="task__category">{{ $task->category['name'] }}</p>
                            <p class="task__description">{{ $task['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

@endsection
