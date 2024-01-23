<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function() {
//     return view('pages.index');
// });

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
//Route::get('/login', [UserController::class, 'login'])->name('user.login');
//Route::get('/register', [UserController::class, 'register'])->name('user.register');

// Route::namespace('')->

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::get('/register', 'loginPage')->name('user.loginPage');
    Route::get('/login', 'registerPage')->name('user.registerPage');
    Route::post('/register', 'register')->name('user.register');
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout')->name('user.logout');
});


Route::controller(CategoryController::class)->prefix('category')->middleware(['admin'])->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::post('/', 'store')->name('category.store');
    Route::post('/{category}/destroy', 'destroy')->name('category.destroy');
    Route::post('/{category}/update', 'update')->name('category.update');
    Route::get('/{category}/edit', 'edit')->name('category.edit');
});
