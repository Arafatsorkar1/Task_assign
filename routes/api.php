<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'task'], function () {
Route::post('user/register',                       [DashboardController::class,  'register']);
Route::post('apiLogin',                            [DashboardController::class,      'ApiLogin']);
});

Route::group(['prefix' => 'taskUser', 'middleware' => ['auth:sanctum']], function () {

Route::get('task-list',                             [DashboardController::class, 'apiIndex']);
Route::post('task-create',                          [DashboardController::class, 'apiCreate']);
Route::post('task/update{id}',                          [DashboardController::class, 'apiUpdate']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
