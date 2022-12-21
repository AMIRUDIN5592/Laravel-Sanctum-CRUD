<?php

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
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/get_users', [App\Http\Controllers\API\AuthController::class, 'get_users']);
    Route::get('/get_users_by_id/{id}', [App\Http\Controllers\API\AuthController::class, 'get_user_by_id']);
    Route::post('/update_user', [App\Http\Controllers\API\AuthController::class, 'update_user']);
    
    Route::get('/delete_user/{id}', [App\Http\Controllers\API\AuthController::class, 'deleteuser']);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});