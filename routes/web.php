<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard'); // root diarahkan ke dashboard
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard'); // route dashboard
})->name('dashboard');

Route::get('/offline', function () {
    return view('offline'); // halaman offline
})->name('offline');
