<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\Owner\UnitController;

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
    // General Dashboard
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
| Owner Routes (Pemilik Kostan)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    // Dashboard Owner
    Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('dashboard');
    
    // Unit Management Routes
    Route::prefix('units')->name('units.')->group(function () {
        // List semua unit milik owner
        Route::get('/', [UnitController::class, 'index'])->name('index');
        
        // Tambah unit baru
        Route::get('/create', [UnitController::class, 'create'])->name('create');
        Route::post('/store', [UnitController::class, 'store'])->name('store');
        
        // Edit unit
        Route::get('/{unit}/edit', [UnitController::class, 'edit'])->name('edit');
        Route::put('/{unit}/update', [UnitController::class, 'update'])->name('update');
        
        // Delete unit
        Route::delete('/{unit}/destroy', [UnitController::class, 'destroy'])->name('destroy');
        
        // Toggle status unit (tersedia/terisi/maintenance)
        Route::patch('/{unit}/toggle-status', [UnitController::class, 'toggleStatus'])->name('toggle-status');
        
        // Detail unit
        Route::get('/{unit}/show', [UnitController::class, 'show'])->name('show');
        
        // Upload foto tambahan
        Route::post('/{unit}/upload-photos', [UnitController::class, 'uploadPhotos'])->name('upload-photos');
        Route::delete('/photo/{photoId}', [UnitController::class, 'deletePhoto'])->name('delete-photo');
    });
    
    // Tenant Management (Penghuni)
    Route::prefix('tenants')->name('tenants.')->group(function () {
        Route::get('/', [OwnerController::class, 'tenants'])->name('index');
        Route::get('/{tenant}', [OwnerController::class, 'tenantDetail'])->name('show');
        Route::post('/{unit}/add-tenant', [OwnerController::class, 'addTenant'])->name('add');
        Route::delete('/{tenant}/remove', [OwnerController::class, 'removeTenant'])->name('remove');
    });
    
    // Payment Management (Pembayaran)
    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [OwnerController::class, 'payments'])->name('index');
        Route::get('/pending', [OwnerController::class, 'pendingPayments'])->name('pending');
        Route::patch('/{payment}/confirm', [OwnerController::class, 'confirmPayment'])->name('confirm');
        Route::get('/report', [OwnerController::class, 'paymentReport'])->name('report');
    });
    
    // Maintenance Requests (Permintaan Perbaikan)
    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/', [OwnerController::class, 'maintenanceRequests'])->name('index');
        Route::get('/{request}', [OwnerController::class, 'maintenanceDetail'])->name('show');
        Route::patch('/{request}/update-status', [OwnerController::class, 'updateMaintenanceStatus'])->name('update-status');
        Route::post('/{request}/add-note', [OwnerController::class, 'addMaintenanceNote'])->name('add-note');
    });
    
    // Reports & Analytics
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/overview', [OwnerController::class, 'reportsOverview'])->name('overview');
        Route::get('/occupancy', [OwnerController::class, 'occupancyReport'])->name('occupancy');
        Route::get('/income', [OwnerController::class, 'incomeReport'])->name('income');
        Route::get('/export/{type}', [OwnerController::class, 'exportReport'])->name('export');
    });
    
    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [OwnerController::class, 'settings'])->name('index');
        Route::put('/update', [OwnerController::class, 'updateSettings'])->name('update');
        Route::put('/update-profile', [OwnerController::class, 'updateProfile'])->name('update-profile');
        Route::put('/change-password', [OwnerController::class, 'changePassword'])->name('change-password');
    });
});

/*
|--------------------------------------------------------------------------
| Tenant Routes (Penghuni/Penyewa)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:tenant'])->prefix('tenant')->name('tenant.')->group(function () {
    Route::get('/dashboard', function () {
        return view('tenant.dashboard');
    })->name('dashboard');
    
    // Profile & Room Info
    Route::get('/room', function () {
        return view('tenant.room');
    })->name('room');
    
    // Payment History
    Route::get('/payments', function () {
        return view('tenant.payments');
    })->name('payments');
    
    // Maintenance Requests
    Route::prefix('maintenance')->name('maintenance.')->group(function () {
        Route::get('/', function () {
            return view('tenant.maintenance.index');
        })->name('index');
        Route::get('/create', function () {
            return view('tenant.maintenance.create');
        })->name('create');
        Route::post('/store', function () {
            return redirect()->route('tenant.maintenance.index');
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
    
    // API untuk owner dashboard
    Route::middleware(['auth', 'role:owner'])->group(function () {
        Route::get('/owner/stats', [OwnerController::class, 'getDashboardStats'])->name('owner.stats');
        Route::get('/owner/recent-activities', [OwnerController::class, 'getRecentActivities'])->name('owner.recent-activities');
        Route::get('/owner/units/status', [UnitController::class, 'getUnitsStatus'])->name('owner.units.status');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Optional - untuk admin panel)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('kost', \App\Http\Controllers\Admin\KostController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
    
    // User role management
    Route::patch('/users/{user}/change-role', function ($user) {
        // Logic untuk mengubah role user
    })->name('users.change-role');
});

/*
|--------------------------------------------------------------------------
| Backward Compatibility Routes
|--------------------------------------------------------------------------
*/

// Route lama yang masih digunakan - redirect ke route baru
Route::get('/dashboard/owner', function () {
    return redirect()->route('owner.dashboard');
})->name('dashboard.owner');

/*
|--------------------------------------------------------------------------
| Redirect Routes
|--------------------------------------------------------------------------
*/

// Redirect /home ke /dashboard untuk user yang sudah login
Route::get('/home', function () {
    if (auth()->check()) {
        $user = auth()->user();
        
        // Redirect berdasarkan role
        switch ($user->role) {
            case 'owner':
                return redirect()->route('owner.dashboard');
            case 'tenant':
                return redirect()->route('tenant.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            default:
                return redirect()->route('dashboard');
        }
    }
    return redirect()->route('home');
});

// Fallback route untuk handle 404
Route::fallback(function () {
    return view('errors.404');
});