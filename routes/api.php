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

Route::prefix('auth')->group(function() {
    Route::post('/login',[App\Http\Controllers\UserController::class, 'login']);
});

Route::middleware(['jwt.auth:ADMIN'])->prefix('appointment')->group(function () {
    Route::get('/all', [App\Http\Controllers\AppointmentController::class, 'getAllAppointments']);
    Route::get('/calender', [App\Http\Controllers\AppointmentController::class, 'getCalender']);
    Route::delete('/{id}', [App\Http\Controllers\AppointmentController::class, 'destroy']);
});

Route::middleware(['jwt.auth:ADMIN,EMPLOYEE'])->prefix('appointment')->group(function () {
    Route::get('/time/{date}', [App\Http\Controllers\AppointmentController::class, 'getTime']);
    Route::get('/{id}', [App\Http\Controllers\AppointmentController::class, 'getAppointment']);
    Route::post('/', [App\Http\Controllers\AppointmentController::class, 'createAppointment']);
    Route::put('/{id}', [App\Http\Controllers\AppointmentController::class, 'updateStatus']);
});

Route::middleware(['jwt.auth:EMPLOYEE'])->prefix('appointment')->group(function () {
    Route::get('/', [App\Http\Controllers\AppointmentController::class, 'getUserAppointments']);
});


Route::middleware(['jwt.auth:ADMIN'])->prefix('work')->group(function () {
    Route::get('/', [App\Http\Controllers\WorkController::class, 'getAllWork']);
    Route::post('/', [App\Http\Controllers\WorkController::class, 'createWork']);
    Route::delete('/{id}', [App\Http\Controllers\WorkController::class, 'destroy']);
});

Route::middleware(['jwt.auth:ADMIN,EMPLOYEE'])->prefix('work')->group(function () {
    Route::get('/{id}', [App\Http\Controllers\WorkController::class, 'getWork']);
    Route::put('/{id}', [App\Http\Controllers\WorkController::class, 'update']);
    Route::put('/selectEmployee/{id}', [App\Http\Controllers\WorkController::class, 'updateEmployee']);
});


Route::middleware(['jwt.auth:EMPLOYEE'])->prefix('employee')->group(function () {
    Route::get('/', [App\Http\Controllers\WorkController::class, 'getUserWork']);
});



Route::middleware(['jwt.auth:ADMIN'])->prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'getAllUsers']);
    Route::get('/{id}', [App\Http\Controllers\UserController::class, 'getUser']);
    Route::post('/', [App\Http\Controllers\UserController::class, 'addUser']);
    Route::put('/{id}', [App\Http\Controllers\UserController::class, 'updateUser']);
    Route::delete('/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
});

Route::middleware(['jwt.auth:EMPLOYEE'])->prefix('summary')->group(function () {
    Route::get('/{id}', [App\Http\Controllers\SummaryController::class, 'getSummary']);
    Route::post('/', [App\Http\Controllers\SummaryController::class, 'createSummary']);
});
