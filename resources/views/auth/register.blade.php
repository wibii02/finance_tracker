@extends('layouts.app')

@section('title', 'Daftar Akun - FinanceTracker')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-sm border-0 p-4" style="width: 420px; border-radius: 15px;">
        <h4 class="text-center fw-bold mb-2">Buat Akun Baru</h4>
        <p class="text-center text-muted mb-4">Mulai kelola keuangan Anda hari ini</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="name" class="form-control border-start-0" placeholder="Masukan nama anda" required>
                </div>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="ex: your@email.com" required>
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-control border-start-0" minlength="6" placeholder="******" required>
                    <span class="input-group-text bg-light border-start-0" style="cursor:pointer;" onclick="togglePassword('password', this)">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password_confirmation" class="form-control border-start-0" minlength="6" placeholder="******" required>
                </div>
            </div>

            {{-- Checkbox --}}
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="agree" required>
                <label class="form-check-label small text-muted" for="agree">
                    Saya setuju dengan <a href="#" class="text-decoration-none">Syarat & Ketentuan</a>
                </label>
            </div>

            {{-- Tombol Daftar --}}
            <button class="btn btn-primary w-100 fw-semibold py-2">Daftar</button>


            {{-- Login --}}
            <p class="text-center mt-4 small text-muted">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">Login di sini</a>
            </p>
        </form>
    </div>
</div>

<script>
    function togglePassword(id, el) {
        const input = document.getElementById(id);
        const icon = el.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>
@endsection
