@extends('user.layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<h3 class="mb-3">Edit Kategori</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tipe</label>
                <select name="tipe" class="form-select" required>
                    <option value="pemasukan" {{ $kategori->tipe=='pemasukan'?'selected':'' }}>Pemasukan</option>
                    <option value="pengeluaran" {{ $kategori->tipe=='pengeluaran'?'selected':'' }}>Pengeluaran</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
