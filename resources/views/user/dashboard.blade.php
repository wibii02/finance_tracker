@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}</h4>
        <p class="text-muted mb-4">Berikut ringkasan keuangan Anda.</p>
    </div>

    {{-- Tombol ke halaman pemasukan --}}
    <a href="{{ route('pemasukan.index') }}" class="btn btn-primary">
        <i class="bi bi-cash-coin me-1"></i> Lihat Data Pemasukan
    </a>
</div>

{{-- Form Tambah Pemasukan --}}
<div class="bg-white rounded p-4 shadow-sm mb-4">
    <h6 class="fw-semibold mb-3">Tambah Pemasukan</h6>
    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-3">
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah (Rp)" required>
            </div>
            <div class="col-md-3">
                <select name="kategori_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
            </div>
        </div>
        <div class="mt-3 text-end">
            <button type="submit" class="btn btn-success">Tambah Pemasukan</button>
        </div>
    </form>
</div>

{{-- Ringkasan Keuangan --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="bg-white border rounded p-3 shadow-sm h-100 text-center">
            <span class="fw-semibold text-secondary d-block mb-2">Total Pendapatan</span>
            <h4 class="fw-bold mb-0 text-success">
                Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
            </h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-white border rounded p-3 shadow-sm h-100 text-center">
            <span class="fw-semibold text-secondary d-block mb-2">Total Pengeluaran</span>
            <h4 class="fw-bold mb-0 text-danger">Rp 0</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-white border rounded p-3 shadow-sm h-100 text-center">
            <span class="fw-semibold text-secondary d-block mb-2">Saldo Akhir</span>
            <h4 class="fw-bold mb-0 text-primary">
                Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
            </h4>
        </div>
    </div>
</div>

@endsection
