<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.dashboard'); // ganti ke dashboard
})->name('dashboard');

Route::get('/offline', function () {
    return view('offline');
})->name('offline');
