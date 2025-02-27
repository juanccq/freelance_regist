<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackingTimeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('/tracking')->group(function () {
            Route::get('/index-ajax', [TrackingTimeController::class, 'indexAjax'])->name('tracking.index-ajax');
            Route::post('/{tracking_time}', [TrackingTimeController::class, 'destroy'])->name('tracking.destroy')->where('tracking_time', '[0-9]+');
            Route::get('/{tracking_time}/edit', [TrackingTimeController::class, 'edit'])->name('tracking.edit')->where('tracking_time', '[0-9]+');
            Route::get('/create', [TrackingTimeController::class, 'create'])->name('tracking.create');
            Route::post('/store', [TrackingTimeController::class, 'store'])->name('tracking.store');
            Route::match(['PUT', 'PATCH'], '/{tracking_time}/edit', [TrackingTimeController::class, 'update'])->name('tracking.update')->where('tracking_time', '[0-9]+');;

            Route::get('/report', [TrackingTimeController::class, 'report'])->name('tracking.report');
        });
    });

    Route::prefix('profile')->group(function () {
        Route::get('profile', [ProfileController::class, 'profile'])->name('profile.profile');
        Route::get('change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::post('change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password-post');
        Route::get('historic-json/{id}', [ProfileController::class, 'historicJSON'])->name('profile.historic-json');
    });
});
