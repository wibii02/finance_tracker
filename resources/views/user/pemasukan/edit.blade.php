@extends('user.layouts.app')

@section('title', 'Edit Pemasukan')

@section('content')

<h3 class="fw-bold mb-4">Edit Pemasukan</h3>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input 
                    type="text" 
                    name="deskripsi" 
                    value="{{ old('deskripsi', $pemasukan->deskripsi) }}" 
                    class="form-control" 
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input 
                    type="number" 
                    name="jumlah" 
                    value="{{ old('jumlah', $pemasukan->jumlah) }}" 
                    class="form-control" 
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input 
                    type="date" 
                    name="tanggal" 
                    value="{{ old('tanggal', $pemasukan->tanggal) }}" 
                    class="form-control" 
                    required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('pemasukan.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>

@endsection
