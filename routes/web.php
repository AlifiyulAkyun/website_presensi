<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\HomeController;


// Redirect root to login page
Route::get('/', function () {
    return redirect('/login');
});

// Authentication routes
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
Route::post('/presensi-mqtt', [PresensiController::class, 'MQTT']);
Route::get('/dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'showForgotPasswordForm')->name('password.request');
    Route::post('/forgot-password', 'forgotPassword')->name('password.email');
});

// Public routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');
Route::resource('mata-kuliah', MataKuliahController::class);
// Authenticated routes
Route::middleware('auth')->group(function () {
    // Mata Kuliah routes
    Route::resource('mata-kuliah', MataKuliahController::class);
    
    // Presensi routes
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    
    // Mahasiswa routes
    Route::middleware('role:mahasiswa')->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    });
});

// Fallback untuk rute yang tidak terdefinisi
Route::fallback(function() {
    return response()->view('errors.404', [], 404);
});