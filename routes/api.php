<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDisposeController;
use App\Http\Controllers\UserExchangeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JWTMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware([JWTMiddleware::class])->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::post('exchange', [ExchangeController::class, 'store']);
    Route::get('exchange/{id}', [ExchangeController::class, 'show']);
    Route::post('exchange/{id}', [ExchangeController::class, 'update']);
    Route::delete('exchange/{id}', [ExchangeController::class, 'destroy']);

    Route::post('category', [CategoryController::class, 'store']);
    Route::post('category/{id}', [CategoryController::class, 'update']);
    Route::get('category/{id}', [CategoryController::class, 'show']);
    Route::delete('category/{id}', [CategoryController::class, 'destroy']);


    Route::get('user/{id}', [UserController::class, 'show']);
    Route::put('user/{id}', [UserController::class, 'update']);

    Route::get('catalogue', [ExchangeController::class, 'indexMobile']);


    Route::post('user-dispose', [UserDisposeController::class, 'store']);
    Route::get('user-dispose/{id}', [UserDisposeController::class, 'show']);

    Route::post('user-exchange', [UserExchangeController::class, 'store']);
    Route::get('user-exchange/{id}', [UserExchangeController::class, 'show']);

    Route::post('trigger-iot', [AuthController::class, 'triggerIot']);
    Route::post('trigger-done', [AuthController::class, 'triggerDone']);
});


Route::get('get-credentials', [AuthController::class, 'getCredentials']);
