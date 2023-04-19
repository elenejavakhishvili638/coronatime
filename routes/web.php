<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Session\AuthController;
use App\Http\Controllers\StatisticController;
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

Route::get('/', [AuthController::class, 'create'])->name('login.create');
Route::post('/', [AuthController::class, 'login'])->name('login.store');
Route::post('logout', [AuthController::class, 'logout'])->name('login.destroy');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('worldwide-statistics', [StatisticController::class, 'showWorldwide'])->name('worldwide.show');
Route::get('by-country-statistics', [StatisticController::class, 'showByCountry'])->name('country.show');
