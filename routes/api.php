<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ParticipantController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store'])->middleware('auth:sanctum');
Route::put('/events/{id}', [EventController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/participants', [ParticipantController::class, 'index']);
Route::get('/participants/{id}', [ParticipantController::class, 'show']);
Route::post('/participants', [ParticipantController::class, 'store'])->middleware('auth:sanctum');
Route::put('/participants/{id}', [ParticipantController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/participants/{id}', [ParticipantController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
