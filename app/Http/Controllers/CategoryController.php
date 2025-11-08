<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::milikUser()
            ->orderBy('nama_kategori')
            ->get();

        return view('user.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('user.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'tipe'          => 'required|in:pemasukan,pengeluaran',
        ]);

        Category::create([
            'user_id'       => Auth::id(),
            'nama_kategori' => $request->nama_kategori,
            'tipe'          => $request->tipe,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Category::milikUser()->findOrFail($id);

        return view('user.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Category::milikUser()->findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'tipe'          => 'required|in:pemasukan,pengeluaran',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'tipe'          => $request->tipe,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Category::milikUser()->findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
