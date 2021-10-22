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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('appointment')->group(function(){
    Route::get('/', [App\Http\Controllers\AppointmentController::class, 'getAllAppointments']);
    Route::post('/', [App\Http\Controllers\AppointmentController::class, 'createAppointment']);
    Route::delete('/{id}', [App\Http\Controllers\AppointmentController::class, 'destroy']);
});

Route::prefix('user')->group(function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'getAllUser']);
    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'getUser']);
    Route::post('/', [App\Http\Controllers\UserController::class, 'addUser']);
    Route::put('/{id}', [App\Http\Controllers\UserController::class, 'updateUser']);
    Route::delete('/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
});
