<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;

// Show the welcome page to the user
Route::get('/', function () {
    return view('welcome');
});

// Show the login form to the user
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Show the registration form to the user
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');

// Handle registration form submission
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group routes by user role with appropriate middleware and URL prefixes
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::resource('polis', PoliController::class);
    });

    Route::middleware(['role:dokter'])->prefix('dokter')->group(function () {
        Route::get('/dashboard', function () {
            return view('dokter.dashboard');
        })->name('dokter.dashboard');
    });

    Route::middleware(['role:pasien'])->prefix('pasien')->group(function () {
        Route::get('/dashboard', function () {
            return view('pasien.dashboard');
        })->name('pasien.dashboard');
    });
});