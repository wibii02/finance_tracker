<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    // Tampilkan daftar pemasukan
    public function index()
    {
        $pemasukan = Income::where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.pemasukan.index', compact('pemasukan'));
    }

    // Form tambah pemasukan
    public function create()
    {
        return view('user.pemasukan.create');
    }

    // Simpan pemasukan
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:255',
            'jumlah'    => 'required',
            'tanggal'   => 'required|date',
        ]);

        // Bersihkan angka
        $jumlah = (int) str_replace(['.', ','], '', $request->jumlah);

        Income::create([
            'user_id'   => Auth::id(),
            'deskripsi' => $request->deskripsi,
            'jumlah'    => $jumlah,
            'tanggal'   => $request->tanggal,
        ]);

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $pemasukan = Income::where('user_id', Auth::id())->findOrFail($id);

        return view('user.pemasukan.edit', compact('pemasukan'));
    }

    // Update pemasukan
    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:255',
            'jumlah'    => 'required',
            'tanggal'   => 'required|date',
        ]);

        $pemasukan = Income::where('user_id', Auth::id())->findOrFail($id);

        // Bersihkan angka
        $jumlah = (int) str_replace(['.', ','], '', $request->jumlah);

        $pemasukan->update([
            'deskripsi' => $request->deskripsi,
            'jumlah'    => $jumlah,
            'tanggal'   => $request->tanggal,
        ]);

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil diperbarui!');
    }

    // Hapus pemasukan
    public function destroy($id)
    {
        $income = Income::where('user_id', Auth::id())->findOrFail($id);
        $income->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil dihapus!');
    }
}
