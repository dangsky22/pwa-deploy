<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.dashboard'); // root diarahkan ke dashboard
})->name('home');

Route::get('/dashboard', function () {
    return view('landing.dashboard'); // tambahin route dashboard
})->name('dashboard');

Route::get('/offline', function () {
    return view('offline');
})->name('offline');
