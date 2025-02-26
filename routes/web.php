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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/tracking/index-ajax', [TrackingTimeController::class, 'indexAjax'])->name('tracking.index-ajax');
    Route::post('/dashboard/tracking/{tracking_time}', [TrackingTimeController::class, 'destroy'])->name('tracking.destroy')->where('tracking_time', '[0-9]+');
    Route::get('/dashboard/tracking/{tracking_time}/edit', [TrackingTimeController::class, 'edit'])->name('tracking.edit')->where('tracking_time', '[0-9]+');
    Route::get('/dashboard/tracking/create', [TrackingTimeController::class, 'create'])->name('tracking.create');
    Route::post('/dashboard/tracking/store', [TrackingTimeController::class, 'store'])->name('tracking.store');
    Route::match(['PUT', 'PATCH'], '/dashboard/tracking/{tracking_time}/edit', [TrackingTimeController::class, 'update'])->name('tracking.update')->where('tracking_time', '[0-9]+');;

    Route::get('/dashboard/tracking/report', [TrackingTimeController::class, 'report'])->name('tracking.report');

    Route::get('profile/profile', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::get('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password-post');
    Route::get('profile/historic-json/{id}', [ProfileController::class, 'historicJSON'])->name('profile.historic-json');
});
