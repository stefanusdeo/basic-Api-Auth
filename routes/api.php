<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('users', [UserController::class, 'getAllUser']);
    Route::put('users', [UserController::class, 'update']);
    Route::delete('users', [UserController::class, 'destroy']);

    Route::get('course', [CourseController::class, 'getCourse']);
    Route::post('course', [CourseController::class, 'store']);
    Route::put('course', [CourseController::class, 'update']);
    Route::delete('course', [CourseController::class, 'destroy']);
});
