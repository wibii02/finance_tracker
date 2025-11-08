@extends('layouts.app')

@section('title', 'Login - FinanceTracker')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-sm border-0 p-4" style="width: 420px; border-radius: 15px;">
        <h4 class="text-center fw-bold mb-2">Masuk ke Akun Anda</h4>
        <p class="text-center text-muted mb-4">Akses dan kelola keuangan pribadi Anda</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="your@email.com" required>
                </div>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-control border-start-0" placeholder="********" required>
                    <span class="input-group-text bg-light border-start-0" style="cursor:pointer;" onclick="togglePassword('password', this)">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            {{-- Remember Me --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label small text-muted" for="remember">
                    Ingat saya
                </label>
            </div>

            {{-- Tombol Login --}}
            <button class="btn btn-primary w-100 fw-semibold py-2">Masuk</button>


            {{-- Register --}}
            <p class="text-center mt-4 small text-muted">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">Daftar di sini</a>
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
