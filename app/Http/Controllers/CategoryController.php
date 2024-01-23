<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Task;
use App\Models\TaskCategory;

class CategoryController extends Controller
{
    // public function __construct() {
    //     if(!auth()->user() || auth()->user()->role_id !== 3) {
    //         abort(403);
    //     }
    // }

    public function index() {

        $categories = TaskCategory::all();

        return view('pages.category', compact('categories'));

    }

    public function edit(TaskCategory $category) {

        return view('pages.edit', compact('category'));

    }

    public function store(StoreRequest $request) {

        TaskCategory::query()->create($request->all());

        return redirect()->back();

    }

    public function destroy(TaskCategory $category) {

//        TaskCategory::query()->where('id', $id)->delete();

        $category->delete();

        return back();

    }

    public function update(TaskCategory $category, UpdateRequest $request) {

        $category->update($request->all());

        return back();

    }



}
