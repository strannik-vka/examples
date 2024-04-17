<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyCodeController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::get('register/confirm', [RegisteredUserController::class, 'confirm'])
        ->name('register.confirm');

    Route::post('register/step1', [RegisteredUserController::class, 'step1'])
        ->name('register.step1');
    Route::post('register/step2', [RegisteredUserController::class, 'step2'])
        ->name('register.step2');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::middleware('not.verified')->group(function () {
        Route::get('verify-code', [VerifyCodeController::class, 'index'])
            ->name('verify.code');

        Route::post('verify-code/check', [VerifyCodeController::class, 'check'])
            ->middleware('throttle:6,1')
            ->name('verify.code.check');

        Route::post('verify-code/store', [VerifyCodeController::class, 'store'])
            ->middleware('throttle:1,1')
            ->name('verify.code.store');
    });

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
