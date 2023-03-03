<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationLogController;
use App\Http\Controllers\SubscriptionChannelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('categories', CategoryController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('logs', NotificationLogController::class);
Route::fallback(function (){
    abort(404, 'API resource not found');
});