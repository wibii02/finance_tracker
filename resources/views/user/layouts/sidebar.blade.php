<div class="d-flex flex-column flex-shrink-0 p-3 bg-white shadow-sm"
     style="width: 250px; min-height: 100vh; border-right: 1px solid #e5e7eb; position: fixed;">

    {{-- Logo / Brand (gambar saja, tanpa teks) --}}
    <div class="text-center mb-4">
        <img src="{{ asset('logo.jpg') }}" 
             alt="FinTrack Logo" 
             style="width: 200px; height: 60px; object-fit: contain;">
    </div>

    {{-- Menu Navigasi --}}
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-1">
            <a href="{{ route('user.dashboard') }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.dashboard') ? 'active' : 'text-dark' }}">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('user.transaksi') }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.transaksi') ? 'active' : 'text-dark' }}">
                <i class="bi bi-wallet2 me-2"></i> Transaksi
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('user.kategori') }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.kategori') ? 'active' : 'text-dark' }}">
                <i class="bi bi-tags me-2"></i> Kategori
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('user.laporan') }}" 
               class="nav-link d-flex align-items-center {{ request()->routeIs('user.laporan') ? 'active' : 'text-dark' }}">
                <i class="bi bi-bar-chart-line me-2"></i> Laporan
            </a>
        </li>
    </ul>


    {{-- Footer Sidebar --}}
    <div class="mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>
</div>
