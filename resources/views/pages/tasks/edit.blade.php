@extends('layouts.app')

@section('title', 'Редактирование задачи')

@section('content')

    <div class="task">

        <div class="task__container container">

            <div class="task__header">
                <h1 class="task__title">Редактирование задачи</h1>
            </div>

            <form action="{{ route('tasks.update', $task->id) }}" method="post" enctype="multipart/form-data" class="task__form">
                @csrf
                @method('PATCH')
                <input class="default-input" type="text" name="name" value="{{ $task->name }}" placeholder="Название">
                <label class="error-text">
                    @error('name') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="number" name="price" value="{{ $task->price }}" placeholder="Цена">
                <label class="error-text">
                    @error('price') {{ $message }}  @enderror
                </label>
                <textarea class="default-input" name="description" placeholder="Название">{{ $task->description }}</textarea>
                <label class="error-text">
                    @error('description') {{ $message }}  @enderror
                </label>
                <select class="default-input" name="task_categories_id">
                    @foreach($categories as $category)
                        <option @selected($task->task_categories_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <label class="error-text">
                    @error('task_categories_id') {{ $message }}  @enderror
                </label>
                <input id="task_image_path" class="default-input hidden" type="file" name="task_image_path">
                <div class="selected-image">
                    <img src="{{ $task->getTaskImagePath() }}" alt="Изображение">
                </div>
                <label for="task_image_path" class="task-form-file">Загрузить изображение</label>
                <label class="error-text">
                    @error('task_image_path') {{ $message }}  @enderror
                </label>
                <button type="submit" class="button">Сохранить</button>
            </form>

        </div>

    </div>

@endsection
