<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Category;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // 🔐 Enkripsi password
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // redirect ke route dashboard
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }

    // Dashboard
    public function dashboard()
    {
        $user = Auth::user();

        // Total pemasukan
        $totalIncome = Income::where('user_id', $user->id)->sum('jumlah');

        // Total pengeluaran
        $totalExpense = Expense::where('user_id', $user->id)->sum('jumlah');

        // Ambil kategori berdasarkan user & tipe
        $categoriesIncome = Category::milikUser()
            ->where('tipe', 'pemasukan')
            ->orderBy('nama_kategori')
            ->get();

        $categoriesExpense = Category::milikUser()
            ->where('tipe', 'pengeluaran')
            ->orderBy('nama_kategori')
            ->get();

        return view('user.dashboard', compact(
            'totalIncome',
            'totalExpense',
            'categoriesIncome',
            'categoriesExpense'
        ));
    }

}
