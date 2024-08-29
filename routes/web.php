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

//Route::get('/ ',[\App\Http\Controllers\DashboardController::class,'login'])->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
           Route::get('/',[\App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard');
           Route::resource('tasks', \App\Http\Controllers\TaskAssignController::class);
           Route::get('/tasks/{id}',     [\App\Http\Controllers\TaskAssignController::class, 'showM'])->name('tasks.show');
           Route::get('/pending/{id}',   [\App\Http\Controllers\TaskAssignController::class, 'pending'])->name('pending');
           Route::get('/progress/{id}',  [\App\Http\Controllers\TaskAssignController::class, 'progress'])->name('progress');
           Route::get('/completed/{id}', [\App\Http\Controllers\TaskAssignController::class, 'completed'])->name('completed');
           Route::get('/ready/{id}',     [\App\Http\Controllers\TaskAssignController::class, 'ready'])->name('ready');


});
