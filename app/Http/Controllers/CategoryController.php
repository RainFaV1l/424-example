<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
//     public function __construct() {
//         if(!auth()->user() || auth()->user()->role_id !== 3) {
//             abort(403);
//         }
//     }

    public function index() {

        $categories = TaskCategory::query()->orderByDesc('created_at')->get();

        return view('pages.category', compact('categories'));

    }

    public function edit(TaskCategory $category) {

        return view('pages.edit', compact('category'));

    }

    public function store(StoreRequest $request) {

        $data = $request->validated();

        TaskCategory::query()->create($data);

        return redirect()->back();

    }

    public function destroy(TaskCategory $category) {

//        TaskCategory::query()->where('id', $id)->delete();

//        foreach ($category->tasks as $task) {
//
//            if(Storage::fileExists($task->task_image_path)) {
//
//                Storage::delete($task->task_image_path);
//
//            }
//
//        }

        $category->delete();

        return back();

    }

//    public function destroy($id) {
//
//        TaskCategory::query()->where('id', $id)->delete();
//
////        foreach ($category->tasks as $task) {
////
////            if(Storage::fileExists($task->task_image_path)) {
////
////                Storage::delete($task->task_image_path);
////
////            }
////
////        }
//
////        $category->delete();
//
//        return back();
//
//    }

    public function update(TaskCategory $category, UpdateRequest $request) {

        $data = $request->validated();

        $category->update($data);

        return back();

    }



}
