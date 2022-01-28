<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('/ping',function() {
    return ['pong'=>true];
});


Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);
Route::post('/user', [AuthController::class, 'create']);

//Route::get('/user', [UserController::class, 'read']);
//Route::get('/user', [UserController::class, 'update']);

Route::get('/users', [UserController::class, 'list']);
Route::get('/user/{id}', [UserController::class, 'one']);
Route::get('/search', [UserController::class, 'search']);