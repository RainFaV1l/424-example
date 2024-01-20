<?php

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

Route::get('/', [TaskController::class, 'index'])->name('task.index');
//Route::get('/login', [UserController::class, 'login'])->name('user.login');
//Route::get('/register', [UserController::class, 'register'])->name('user.register');

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::get('/register', 'loginPage')->name('user.loginPage');
    Route::get('/login', 'registerPage')->name('user.registerPage');
    Route::post('/register', 'register')->name('user.register');
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout')->name('user.logout');
});
