<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $mode = $request->get('mode', 'bulanan'); 
        $userId = Auth::id();

        if ($mode == 'mingguan') {
            $start = Carbon::now()->startOfWeek();
            $end   = Carbon::now()->endOfWeek();
        }

        elseif ($mode == 'bulanan') {
            $start = Carbon::now()->startOfMonth();
            $end   = Carbon::now()->endOfMonth();
        }

        elseif ($mode == 'tahunan') {
            $start = Carbon::now()->startOfYear();
            $end   = Carbon::now()->endOfYear();
        }

        else {
            $start = Carbon::now()->startOfMonth();
            $end   = Carbon::now()->endOfMonth();
        }

        // Ambil data
        $pemasukan = Income::where('user_id', $userId)
            ->whereBetween('tanggal', [$start, $end])
            ->orderBy('tanggal', 'asc')
            ->get();

        $pengeluaran = Expense::where('user_id', $userId)
            ->whereBetween('tanggal', [$start, $end])
            ->orderBy('tanggal', 'asc')
            ->get();

        // Hitung total
        $totalIncome = $pemasukan->sum('jumlah');
        $totalExpense = $pengeluaran->sum('jumlah');
        $saldo = $totalIncome - $totalExpense;

        return view('user.laporan.index', compact(
            'mode',
            'start',
            'end',
            'pemasukan',
            'pengeluaran',
            'totalIncome',
            'totalExpense',
            'saldo'
        ));
    }
}
