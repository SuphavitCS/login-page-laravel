<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    // Route for email verification
    Route::get('/verify-email', function () {
        return view('auth.verify-email');
    });
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');
    // button for sending verification email
});

Route::get('verify-email/{id}/{hash}', [VerifyEmail::class])->middleware(['auth','signed', 'throttle:6,1'])->name('verification.verify');

Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth','verified'])->name('dashboard');
