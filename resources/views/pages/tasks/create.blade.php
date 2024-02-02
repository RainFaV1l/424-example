@extends('layouts.app')

@section('title', 'Добавление задачи')

@section('content')

    <div class="task">

        <div class="task__container container">

            <div class="task__header">
                <h1 class="task__title">Добавление задачи</h1>
            </div>

            <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data" class="task__form">
                @csrf
                <input class="default-input" type="text" name="name" value="{{ old('name') }}" placeholder="Название">
                <label class="error-text">
                    @error('name') {{ $message }}  @enderror
                </label>
                <input class="default-input" type="number" name="price" value="{{ old('price') }}" placeholder="Цена">
                <label class="error-text">
                    @error('price') {{ $message }}  @enderror
                </label>
                <textarea class="default-input" name="description" placeholder="Название">{{ old('description') }}</textarea>
                <label class="error-text">
                    @error('description') {{ $message }}  @enderror
                </label>
                <select class="default-input" name="task_categories_id">
                    @foreach($categories as $category)
                        <option @selected($category->id == old('task_categories_id')) value="{{ $category->id }}">{{ $category->name }}</option>
{{--                        <option @selected($category->id === (int) old('task_categories_id')) value="{{ $category->id }}">{{ $category->name }}</option>--}}
                    @endforeach
                </select>
                <label class="error-text">
                    @error('task_categories_id') {{ $message }}  @enderror
                </label>
                <input id="task_image_path" class="default-input hidden" type="file" name="task_image_path">
                <label for="task_image_path" class="task-form-file">Загрузить изображение</label>
                <label class="error-text">
                    @error('task_image_path') {{ $message }}  @enderror
                </label>
                <button type="submit" class="button">Добавить</button>
            </form>

        </div>

    </div>

@endsection
