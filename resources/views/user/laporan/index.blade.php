@extends('user.layouts.app')

@section('title', 'Laporan Keuangan')

@section('content')

<h3 class="fw-bold mb-4">Laporan Keuangan</h3>

{{-- Filter laporan --}}
<form method="GET" class="mb-4">
    <div class="d-flex gap-2">
        <select name="mode" class="form-select w-auto">
            <option value="mingguan" {{ $mode=='mingguan'?'selected':'' }}>Mingguan</option>
            <option value="bulanan" {{ $mode=='bulanan'?'selected':'' }}>Bulanan</option>
            <option value="tahunan" {{ $mode=='tahunan'?'selected':'' }}>Tahunan</option>
        </select>

        <button class="btn btn-primary">Tampilkan</button>
    </div>
</form>

{{-- Summary --}}
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="p-3 bg-white shadow-sm rounded text-center">
            <h6 class="text-muted">Total Pemasukan</h6>
            <h4 class="text-success">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-3 bg-white shadow-sm rounded text-center">
            <h6 class="text-muted">Total Pengeluaran</h6>
            <h4 class="text-danger">Rp {{ number_format($totalExpense, 0, ',', '.') }}</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-3 bg-white shadow-sm rounded text-center">
            <h6 class="text-muted">Saldo Akhir</h6>
            <h4 class="text-primary">Rp {{ number_format($saldo, 0, ',', '.') }}</h4>
        </div>
    </div>
</div>

{{-- Table Data --}}
<div class="bg-white p-4 shadow-sm rounded mb-4">
    <h5 class="fw-bold mb-3">Detail Pemasukan</h5>

    @if($pemasukan->isEmpty())
        <p class="text-muted">Tidak ada data pemasukan.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pemasukan as $p)
                    <tr>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->deskripsi }}</td>
                        <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<div class="bg-white p-4 shadow-sm rounded">
    <h5 class="fw-bold mb-3">Detail Pengeluaran</h5>

    @if($pengeluaran->isEmpty())
        <p class="text-muted">Tidak ada data pengeluaran.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pengeluaran as $p)
                    <tr>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->deskripsi }}</td>
                        <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
