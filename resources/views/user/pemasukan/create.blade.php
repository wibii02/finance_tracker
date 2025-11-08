@extends('user.layouts.sidebar')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Tambah Pemasukan</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('pemasukan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('pemasukan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
