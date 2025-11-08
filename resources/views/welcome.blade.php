<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceTracker</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar tetap di atas, warna solid */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Hero section */
        .hero {
            height: calc(100vh - 80px); /* dikurangi tinggi navbar */
            background: url('{{ asset('hero.jpg') }}') center center / cover no-repeat;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: white;
        }

        /* Overlay */
        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 0 5%;
            max-width: 600px;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 3rem;
            line-height: 1.2;
        }

        .hero h1 span {
            color: #3b82f6;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        /* Fitur Section */
        .fitur-section {
            padding: 6rem 0;
            background-color: #f8fafc;
        }

        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        footer {
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 1rem 0;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" width="200" class="me-2">
            </a>
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
            </div>
        </div>
    </nav>

    {{-- Spacer untuk menghindari ketiban navbar --}}
    <div style="height: 80px;"></div>

    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-content">
            <h1>Kelola Keuangan Pribadi dengan <span>Mudah</span></h1>
            <p class="lead text-light mt-3 mb-4">
                Pantau pengeluaran, atur anggaran, dan capai tujuan finansial Anda dengan aplikasi yang intuitif dan powerful.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-3 shadow">Mulai Sekarang</a>
            <a href="#fitur" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    {{-- Fitur Section --}}
    <section id="fitur" class="fitur-section text-center">
        <div class="container">
            <h2 class="fw-bold mb-3">Mengapa Memilih FinanceTracker?</h2>
            <p class="text-muted mb-5">Fitur lengkap untuk mengelola keuangan pribadi Anda</p>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-graph-up text-primary fs-1 mb-3"></i>
                        <h5 class="fw-semibold">Visualisasi Data</h5>
                        <p class="text-muted mb-0">Lihat pengeluaran Anda melalui chart yang informatif dan mudah dipahami.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-lightning-charge text-success fs-1 mb-3"></i>
                        <h5 class="fw-semibold">Cepat & Responsif</h5>
                        <p class="text-muted mb-0">Interface smooth dan loading super cepat untuk pengalaman terbaik.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-shield-lock text-warning fs-1 mb-3"></i>
                        <h5 class="fw-semibold">Aman & Terpercaya</h5>
                        <p class="text-muted mb-0">Data Anda dilindungi dengan enkripsi tingkat enterprise.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-lightbulb text-info fs-1 mb-3"></i>
                        <h5 class="fw-semibold">Insight Finansial</h5>
                        <p class="text-muted mb-0">Dapatkan rekomendasi untuk meningkatkan kesehatan finansial Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="text-center text-muted">
        <small>© 2025 FinanceTracker — Kelola keuangan Anda dengan percaya diri.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
