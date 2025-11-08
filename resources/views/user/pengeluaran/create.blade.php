@extends('user.layouts.app')

@section('title', 'Tambah Pengeluaran')

@section('content')

<h3 class="mb-3">Tambah Pengeluaran</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            {{-- Dropdown kategori pengeluaran --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($categoriesExpense as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
