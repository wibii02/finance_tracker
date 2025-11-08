<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $pemasukan = Income::where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.pemasukan.index', compact('pemasukan'));
    }

    public function create()
    {
        // Ambil kategori pemasukan milik user
        $categoriesIncome = Category::milikUser()
            ->where('tipe', 'pemasukan')
            ->orderBy('nama_kategori')
            ->get();

        return view('user.pemasukan.create', compact('categoriesIncome'));
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

        Income::create([
            'user_id'     => Auth::id(),
            'deskripsi'   => $request->deskripsi,
            'jumlah'      => $jumlah,
            'tanggal'     => $request->tanggal,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pemasukan = Income::where('user_id', Auth::id())->findOrFail($id);

        // Ambil kategori pemasukan
        $categoriesIncome = Category::milikUser()
            ->where('tipe', 'pemasukan')
            ->orderBy('nama_kategori')
            ->get();

        return view('user.pemasukan.edit', compact('pemasukan', 'categoriesIncome'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi'   => 'required|string|max:255',
            'jumlah'      => 'required',
            'tanggal'     => 'required|date',
            'kategori_id' => 'required|exists:categories,id',
        ]);

        $pemasukan = Income::where('user_id', Auth::id())->findOrFail($id);

        $jumlah = (int) str_replace(['.', ','], '', $request->jumlah);

        $pemasukan->update([
            'deskripsi'   => $request->deskripsi,
            'jumlah'      => $jumlah,
            'tanggal'     => $request->tanggal,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $income = Income::where('user_id', Auth::id())->findOrFail($id);
        $income->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil dihapus!');
    }
}
