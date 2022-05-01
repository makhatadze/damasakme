<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Back\CityAreaController;
use App\Http\Controllers\Back\CityAreaDistrictController;
use App\Http\Controllers\Back\CityController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\DegreeController;
use App\Http\Controllers\Back\JobsController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['setLocale'])
    ->group(function () {
        Route::get('/', HomeController::class)->name('home');


        Route::get('en', function () {
            session(['locale' => 'en']);
            return back();
        });

        Route::get('es', function () {
            session(['locale' => 'ru']);
            return back();
        });


        Route::prefix(config('admin.prefix'))
            ->group(function () {
                Route::middleware('auth')->group(function () {
                    Route::get('dashboard', DashboardController::class)->name('dashboard');
                    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

                    Route::apiResource('users', UserController::class);
                    Route::apiResource('jobs', JobsController::class);
                    Route::apiResource('degrees', DegreeController::class);
                    Route::apiResource('cities', CityController::class);
                    Route::apiResource('city-areas', CityAreaController::class);
                    Route::apiResource('city-area-districts', CityAreaDistrictController::class);

                    Route::get('profile', ProfileController::class)->name('profile');
                });

                Route::middleware('guest')->group(function () {
                    Route::get('login', [LoginController::class, 'create'])->name('login');
                    Route::post('login', [LoginController::class, 'store']);

            Route::get('register', [RegisterController::class, 'create'])->name('register');
            Route::post('register', [RegisterController::class, 'store']);
//
            Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
            Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
                });
            });
    });


