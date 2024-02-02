<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

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

//Route::get('/', [TaskController::class, 'index'])->name('task.index');
//Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
//Route::get('/login', [UserController::class, 'login'])->name('user.login');
//Route::get('/register', [UserController::class, 'register'])->name('user.register');

// Route::namespace('')->

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::get('/register', 'registerPage')->name('user.registerPage');
    Route::get('/login', 'loginPage')->name('user.loginPage');
    Route::post('/register', 'register')->name('user.register');
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout')->name('user.logout');
    Route::get('/profile', 'profile')->name('user.profile')->middleware('auth');
});

Route::controller(OrderController::class)->prefix('orders')->group(function () {
    Route::post('/{order}/plus', 'plus')->name('orders.plus');
    Route::post('/{order}/minus', 'minus')->name('orders.minus');
});

Route::controller(CartController::class)->prefix('carts')->middleware(['auth'])->group(function () {
    Route::post('/{cart}/checkout', 'checkout')->name('carts.checkout');
    Route::post('/tasks/{task}', 'store')->name('cart.store');
    Route::post('/{cart}/destroy', 'destroy')->name('cart.destroy');
    Route::post('/{cart}/tasks/{task}/destroy', 'destroyCartTask')->name('cart.task.destroy');
    Route::get('/', 'index')->name('cart.index');
});

Route::controller(CategoryController::class)->prefix('category')->middleware(['admin'])->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::post('/', 'store')->name('category.store');
    Route::post('/{category}/destroy', 'destroy')->name('category.destroy');
    Route::post('/{category}/update', 'update')->name('category.update');
    Route::get('/{category}/edit', 'edit')->name('category.edit');
});

Route::controller(\App\Http\Controllers\IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index.index');
});

Route::controller(TaskController::class)->prefix('tasks')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('tasks.index');
    Route::get('/create', 'create')->name('tasks.create');
    Route::post('/', 'store')->name('tasks.store');
    Route::get('/{task}', 'show')->name('tasks.show');
    Route::get('/{task}/edit', 'edit')->name('tasks.edit');
//    Route::post('/{task}/update', 'update')->name('tasks.update');
    Route::patch('/{task}', 'update')->name('tasks.update');
    Route::post('/{task}', 'destroy')->name('tasks.destroy');
});
