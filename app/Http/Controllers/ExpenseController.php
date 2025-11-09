<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $pengeluaran = Expense::where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.pengeluaran.index', compact('pengeluaran'));
    }

    public function create()
    {
        // Kategori pengeluaran
        $categoriesExpense = Category::milikUser()
            ->where('tipe', 'pengeluaran')
            ->orderBy('nama_kategori')
            ->get();

        return view('user.pengeluaran.create', compact('categoriesExpense'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi'   => 'required|string|max:255',
            'jumlah'      => 'required',
            'tanggal'     => 'required|date',
            'kategori_id' => 'required|exists:categories,id',
        ]);

        $jumlah = (int) str_replace(['.', ','], '', $request->jumlah);

        Expense::create([
            'user_id'     => Auth::id(),
            'deskripsi'   => $request->deskripsi,
            'jumlah'      => $jumlah,
            'tanggal'     => $request->tanggal,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengeluaran = Expense::where('user_id', Auth::id())->findOrFail($id);

        // Ambil kategori pengeluaran
        $categoriesExpense = Category::milikUser()
            ->where('tipe', 'pengeluaran')
            ->orderBy('nama_kategori')
            ->get();

        return view('user.pengeluaran.edit', compact('pengeluaran', 'categoriesExpense'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi'   => 'required|string|max:255',
            'jumlah'      => 'required',
            'tanggal'     => 'required|date',
            'kategori_id' => 'required|exists:categories,id',
        ]);

        $pengeluaran = Expense::where('user_id', Auth::id())->findOrFail($id);

        $jumlah = (int) str_replace(['.', ','], '', $request->jumlah);

        $pengeluaran->update([
            'deskripsi'   => $request->deskripsi,
            'jumlah'      => $jumlah,
            'tanggal'     => $request->tanggal,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengeluaran = Expense::where('user_id', Auth::id())->findOrFail($id);
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
