<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

// Halaman login & register (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Dashboard & fitur lain (auth only)
Route::middleware('auth')->group(function () {

    // Redirect /home ke dashboard
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    });

    // Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // CRUD pemasukan
    Route::resource('pemasukan', IncomeController::class);

    // CRUD pengeluaran
    Route::resource('pengeluaran', ExpenseController::class);

    // CRUD Kategori
    Route::resource('kategori', CategoryController::class);

    // laporan keungan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
