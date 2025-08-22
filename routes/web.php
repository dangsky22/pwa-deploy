<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page (Public)
Route::get('/', function () {
    return view('landing.dashboard');
})->name('home');

// Offline Page (PWA Support)
Route::get('/offline', function () {
    return view('offline');
})->name('offline');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Guest Routes (hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Register Routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // Forgot Password Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    
    // Reset Password Routes
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Authenticated Routes (hanya bisa diakses jika sudah login)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Profile Routes (optional)
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');
    
    // Kost Management Routes (sesuai dengan konsep KOZE Management)
    Route::prefix('kost')->name('kost.')->group(function () {
        Route::get('/', function () {
            return view('kost.index');
        })->name('index');
        
        Route::get('/search', function () {
            return view('kost.search');
        })->name('search');
        
        Route::get('/{id}', function ($id) {
            return view('kost.detail', compact('id'));
        })->name('detail');
    });
    
    // Booking Routes (untuk sistem booking kost)
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', function () {
            return view('booking.index');
        })->name('index');
        
        Route::get('/create/{kost_id}', function ($kost_id) {
            return view('booking.create', compact('kost_id'));
        })->name('create');
        
        Route::post('/', function () {
            // Logic untuk create booking
            return redirect()->route('booking.index');
        })->name('store');
    });
});

/*
|--------------------------------------------------------------------------
| API Routes untuk AJAX (Optional)
|--------------------------------------------------------------------------
*/
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/kost/search', function () {
        // API endpoint untuk search kost via AJAX
        return response()->json([
            'status' => 'success',
            'data' => []
        ]);
    })->name('kost.search');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Optional - untuk admin panel)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('kost', \App\Http\Controllers\Admin\KostController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
});

/*
|--------------------------------------------------------------------------
| Redirect Routes
|--------------------------------------------------------------------------
*/

// Redirect /home ke /dashboard untuk user yang sudah login
Route::get('/home', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('home');
});

// Fallback route untuk handle 404
Route::fallback(function () {
    return view('errors.404');
});