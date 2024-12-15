<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDisposeController;
use App\Http\Controllers\UserExchangeController;
use App\Http\Middleware\CheckCookie;
use App\Http\Middleware\Cookie;
use App\Http\Middleware\CookieUser;
use App\Http\Middleware\CookieUserMobile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/login', function () {
    return view('pages.login');
})->middleware(CheckCookie::class);

Route::get('/signup', function () {
    return view('pages.signup');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(CookieUser::class)->name('user.dashboard');

Route::get('/category', function () {
    return view('pages.category');
})->middleware(CookieUser::class);

Route::get('/exchange', [ExchangeController::class, 'index'])->middleware(CookieUser::class);



Route::middleware([Cookie::class])->prefix('admin')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/category', [CategoryController::class, 'index']);

    Route::get('/exchange', [ExchangeController::class, 'index']);

    Route::get('/user', [UserController::class, 'index']);

    Route::get('/user-exchange', [UserExchangeController::class, 'index']);

    Route::get('/user-dispose', [UserDisposeController::class, 'index']);
});


Route::prefix('mobile')->group(function () {
    Route::get('/login', function () {
        return view('pages.mobile.login');
    });
    Route::get('/sign-up', function () {
        return view('pages.mobile.signup');
    });

    Route::get('/sign-in', function () {
        return view('pages.mobile.signin');
    });

    Route::get('/dashboard', function () {
        return view('pages.mobile.dashboard');
    })->middleware(CookieUser::class);

    Route::get('/profile', function () {
        return view('pages.mobile.profile');
    })->middleware(CookieUser::class);

    Route::get('/disposed',[UserDisposeController::class,'indexMobile'])->middleware(CookieUser::class);
    Route::get('/exchange',[UserExchangeController::class,'indexMobile'])->middleware(CookieUser::class);

    Route::get('/points',[UserController::class, 'myPoints'])->middleware(CookieUser::class);

    Route::get('/catalogue',[ExchangeController::class, 'indexMobile'])->middleware(CookieUser::class);



    Route::get('/maps', function () {
        return view('pages.mobile.maps');
    })->middleware(CookieUserMobile::class);

    Route::get('/logout', [AuthController::class, 'logouMobile']);
});


Route::get('/logout', [AuthController::class, 'logout']);
