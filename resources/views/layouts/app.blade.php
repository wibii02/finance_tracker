<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'FinanceTracker'))</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding-top: 0.8rem;
            padding-bottom: 0.8rem;
        }

        .navbar-brand {
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .navbar-brand span:first-child {
            color: #2563eb; /* biru */
        }

        .navbar-brand span:last-child {
            color: #111827; /* hitam */
        }

        .btn-logout {
            font-size: 0.9rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-logout:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" width="200" class="me-2">
            </a>

            {{-- Tombol Logout hanya muncul jika user login --}}
            @auth
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-logout">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    {{-- Spacer biar konten gak ketiban navbar --}}
    <div style="height: 80px;"></div>

    {{-- Flash Messages --}}
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Konten halaman --}}
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Auto hide alert --}}
    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(a => a.classList.remove('show'));
        }, 3000);
    </script>
</body>
</html>
