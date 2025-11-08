@extends('user.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<h3 class="mb-3">Tambah Kategori</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tipe</label>
                <select name="tipe" class="form-select" required>
                    <option value="" disabled selected>Pilih Tipe</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
