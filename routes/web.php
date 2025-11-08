<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

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

    // Halaman lain
    Route::get('/transaksi', function () {
        return view('user.transaksi');
    })->name('user.transaksi');

    Route::get('/kategori', function () {
        return view('user.kategori');
    })->name('user.kategori');

    Route::get('/laporan', function () {
        return view('user.laporan');
    })->name('user.laporan');

    // CRUD pemasukan
    Route::resource('pemasukan', IncomeController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
