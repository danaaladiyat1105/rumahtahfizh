<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\TahfizhController;



Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [SantriController::class, 'dashboard'])->name('dashboard');
    Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');
    Route::get('/tahfizh', [TahfizhController::class, 'index'])->name('tahfizh.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Tambahkan rute lainnya yang ingin dilindungi di sini
});
// Route untuk dashboard yang menggunakan middleware auth
Route::get('/dashboard', [SantriController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::group(['middleware' => 'auth'], function () {
        // Semua rute di dalam group ini akan memerlukan login
        Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
        Route::get('/santri', [SantriController::class, 'index'])->name('santri.index');
        Route::get('/tahfizh', [TahfizhController::class, 'index'])->name('tahfizh.index');
        // Tambahkan rute lainnya yang ingin dilindungi di sini
    });
// Route untuk profile, menggunakan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route khusus untuk admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

// Route resource untuk Santri
Route::resource('santri', SantriController::class);
Route::get('/data-santri', [SantriController::class, 'index'])->name('data-santri');
Route::get('/dashboard', [SantriController::class, 'dashboard'])->name('dashboard');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

// Route untuk mengakses halaman index
Route::get('/tahfizh', [TahfizhController::class, 'index'])->name('tahfizh');
Route::get('/tahfizh/create/{santri}', [TahfizhController::class, 'create'])->name('tahfizh.create');
Route::post('/tahfizh/store/{santri}', [TahfizhController::class, 'store'])->name('tahfizh.store');

require __DIR__.'/auth.php';