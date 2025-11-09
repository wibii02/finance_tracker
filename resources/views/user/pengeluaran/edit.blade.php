@extends('user.layouts.app')

@section('title', 'Edit Pengeluaran')

@section('content')

<h3 class="mb-3">Edit Pengeluaran</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ $pengeluaran->deskripsi }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="{{ $pengeluaran->jumlah }}" class="form-control" required>
            </div>

            {{-- Dropdown kategori pengeluaran --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-select" required>
                    @foreach ($categoriesExpense as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $cat->id == $pengeluaran->kategori_id ? 'selected' : '' }}>
                            {{ $cat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ $pengeluaran->tanggal }}" class="form-control" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection
