<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index() {

        $tasks = Task::all();

        return view('pages.tasks.index', compact('tasks'));

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

    public function edit() {
        return view('');
    }

    public function update() {

    }

}
