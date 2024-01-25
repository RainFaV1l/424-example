<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index(Request $request) {

        $categories = TaskCategory::query()->orderBy('name')->get();

        if(isset($request->all()['category'])) {

            $category_id = $request->all()['category'];

            $tasks = Task::query()->where('task_categories_id', $category_id)->orderByDesc('created_at')->get();

        } else {

            $tasks = Task::query()->orderByDesc('created_at')->get();

        }

        return view('pages.tasks.index', compact('tasks', 'categories'));

    }

    public function create() {

        $categories = TaskCategory::all();

        return view('pages.tasks.create', compact('categories'));

    }

    public function store(StoreRequest $request) {

        $data = $request->all();

        if($request->hasFile('task_image_path')) {

            $path = $request->file('task_image_path')->store('public/tasks');

            $data['task_image_path'] = $path;

            Task::query()->create($data);

            return redirect()->route('tasks.index');

        }

        return back();

    }

    public function show() {
        return view('');
    }

    public function edit(Task $task) {

        $categories = TaskCategory::all();

        return view('pages.tasks.edit', compact('task', 'categories'));

    }

    public function update(Task $task, UpdateRequest $request) {

        $data = $request->all();

        if($request->hasFile('task_image_path')) {

            $data['task_image_path'] = $request->file('task_image_path')->store('public/tasks');

            if(Storage::fileExists($task->task_image_path)) {

                Storage::delete($task->task_image_path);

            }

        }

        $task->update($data);

        return back();

    }

    public function destroy(Task $task) {

//        Task::query()->find($id)->delete();

//        Task::query()->where('id', $id)->delete();

        $condition = Storage::fileExists($task->task_image_path);

//        if($condition) {
//            Storage::delete($task->task_image_path);
//        }

        $condition ? Storage::delete($task->task_image_path) : '';

        $task->delete();

        return redirect()->route('tasks.index');

    }

}
