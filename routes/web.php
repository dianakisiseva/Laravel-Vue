<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/get-tasks', [App\Http\Controllers\TaskController::class, 'getTasksByEmail']);

Route::get('/check-subtasks', [App\Http\Controllers\TaskController::class, 'checkSubtasksOfAllTasks']);
Route::get('/check-subtasks-for-task', [App\Http\Controllers\TaskController::class, 'checkLastSubtaskOfOneTask']);

Route::get('{any}', function () {
    return view('app');
});


