<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\GuestAdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public route
Route::get('/', function () {
    return view('welcome');
});

// Admin routes with 'admin' prefix
Route::prefix('admin')->name('admin.')->group(function () {

    // Routes for guests (admins not logged in)
    Route::middleware(GuestAdminMiddleware::class)->group(function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });

    // Routes for logged-in admins
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
        
        // Admin dashboard and hostel management
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        // Hostel form routes
        Route::get('/add-hostel', [HostelController::class, 'create'])->name('hostels.create');
        Route::post('/add-hostel', [HostelController::class, 'store'])->name('hostels.store');

        // Booking management
        Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('admin/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
        Route::post('admin/bookings/approve/{booking}', [AdminBookingController::class, 'approve'])->name('bookings.approve');
        Route::post('admin/bookings/reject/{booking}', [AdminBookingController::class, 'reject'])->name('bookings.reject');
        Route::get('admin/users', [AdminUserController::class, 'index'])->name('users.index');


        
    });
});
});

// Default user logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// User authentication routes
Auth::routes();

// User home route with middleware protection
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(UserMiddleware::class);

// User routes for hostels and bookings
Route::middleware(['auth'])->group(function () {
    Route::get('hostels', [HostelController::class, 'index'])->name('hostels.index');
    Route::post('/book-double/{hostel}', [BookingController::class, 'bookDouble'])->name('book.double');
    Route::post('/book-single/{hostel}', [BookingController::class, 'bookSingle'])->name('book.single');
});
