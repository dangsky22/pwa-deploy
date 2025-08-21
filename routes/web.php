<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; // Pastikan controller ini ada

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/', function () {
    return view('landing.dashboard'); // root diarahkan ke dashboard
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard'); // route dashboard
})->name('dashboard');

Route::get('/offline', function () {
    return view('offline'); // halaman offline
})->name('offline');
