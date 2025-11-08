<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FinTrack</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Poppins', sans-serif;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    @include('user.layouts.sidebar')

    {{-- Konten Utama --}}
    <div class="main-content">
        <div class="mb-4">
            <h4 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name ?? 'User' }}</h4>
            <p class="text-muted mb-4">Berikut ringkasan keuangan Anda.</p>
        </div>

        {{-- Ringkasan Keuangan --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="bg-white border rounded p-3 shadow-sm h-100 text-center">
                    <span class="fw-semibold text-secondary d-block mb-2">Total Pendapatan</span>
                    <h4 class="fw-bold mb-0 text-success">Rp -</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded p-3 shadow-sm h-100 text-center">
                    <span class="fw-semibold text-secondary d-block mb-2">Total Pengeluaran</span>
                    <h4 class="fw-bold mb-0 text-danger">Rp -</h4>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-white border rounded p-3 shadow-sm h-100 text-center">
                    <span class="fw-semibold text-secondary d-block mb-2">Saldo Akhir</span>
                    <h4 class="fw-bold mb-0 text-primary">Rp -</h4>
                </div>
            </div>
        </div>

        {{-- Placeholder Grafik --}}
        <div class="bg-white rounded p-4 shadow-sm mb-4">
            <h6 class="fw-semibold mb-3">Tren Keuangan</h6>
            <p class="text-muted">Visualisasi pendapatan dan pengeluaran 6 bulan terakhir</p>
            <div class="text-center py-5 text-secondary" style="opacity: 0.6;">
                <i class="bi bi-bar-chart-line fs-1 d-block mb-2"></i>
                <span></span>
            </div>
        </div>

        {{-- Placeholder Transaksi --}}
        <div class="bg-white rounded p-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold">Transaksi Terbaru</h6>
                <a href="{{ route('user.transaksi') }}" class="text-decoration-none text-primary small fw-semibold">Lihat Semua</a>
            </div>

            <p class="text-muted">Data transaksi akan ditampilkan setelah integrasi backend.</p>
        </div>
    </div>

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
