<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

// --- ROUTE PUBLIK (Bisa diakses tanpa login) ---

// Redirect halaman utama ke form lapor banjir (agar warga langsung melihat form)
Route::get('/', function () {
    return redirect()->route('laporbanjir.form');
});

// Form Pelaporan & Proses Simpan (Akses Warga)
Route::get('/lapor', [LaporBanjirController::class, 'form'])->name('laporbanjir.form');
Route::post('/lapor', [LaporBanjirController::class, 'simpan'])->name('laporbanjir.store');

// Route Praktikum Students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');


// --- ROUTE AUTHENTICATION (Guest Only) ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});


// --- ROUTE TERPROTEKSI (Wajib Login Petugas) ---
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Pengelolaan / Daftar Laporan (Hanya Petugas)
    Route::get('/daftar-laporan', [LaporBanjirController::class, 'daftar'])->name('laporbanjir.index');

    // Profil Petugas BPBD
    Route::get('/profil', function () {
        return view('petugas.profil');
    })->name('petugas.profil');
});