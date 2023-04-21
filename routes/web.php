<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Session\AuthController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/lang', [LanguageController::class, 'switchLang'])->name('setLanguage');


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'create')->middleware('guest')->name('login');
    Route::post('/', 'login')->middleware('guest')->name('login.store');
    Route::post('logout', 'logout')->name('login.destroy');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('register',  'create')->name('register.create');
    Route::post('register',  'store')->name('register.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(StatisticController::class)->group(function () {
        Route::get('worldwide-statistics',  'showWorldwide')->name('worldwide.show');
        Route::get('by-country-statistics',  'showByCountry')->name('country.show');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(VerificationController::class)->group(function () {
        Route::get('/email/verify', 'show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verify')->middleware('signed')->name('verification.verify');
    });
});

Route::middleware('guest')->group(function () {
    Route::controller(PasswordResetController::class)->group(function () {
        Route::get('/forgot-password', 'showRequest')->name('password.request');
        Route::post('/forgot-password', 'storeEmail')->name('password.email');
        Route::get('/reset-password/{token}', 'showReset')->name('password.reset');
        Route::post('/reset-password', 'update')->name('password.update');
    });
});
