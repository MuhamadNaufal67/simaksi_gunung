<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SIMAKSI.COM</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
        :root{
            --simaksi-primary:#15803d;
            --simaksi-primary-hover:#166534;
            --simaksi-primary-soft:rgba(21,128,61,.12);
            --simaksi-bg:#f8fafc;
            --simaksi-card:#ffffff;
            --simaksi-text:#0f172a;
            --simaksi-muted:#64748b;
            --simaksi-border:#e5e7eb;
            --simaksi-radius:24px;
            --simaksi-radius-sm:12px;
            --simaksi-shadow:0 20px 60px rgba(15,23,42,.10);
        }

        *{ box-sizing:border-box; margin:0; padding:0; }

        body{
            font-family:'Plus Jakarta Sans','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color:var(--simaksi-text);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:24px;
            background:
                radial-gradient(circle at top left, rgba(21,128,61,.10), transparent 32%),
                radial-gradient(circle at bottom right, rgba(21,128,61,.08), transparent 34%),
                linear-gradient(180deg, #f8fcf9 0%, #f4faf6 48%, var(--simaksi-bg) 100%);
        }

        .auth-shell{ width:100%; max-width:440px; animation:slideUp .5s ease; }

        @keyframes slideUp{ from{ opacity:0; transform:translateY(18px);} to{ opacity:1; transform:translateY(0);} }

        .auth-back{
            display:inline-flex; align-items:center; gap:8px;
            color:var(--simaksi-muted); text-decoration:none; font-weight:600; font-size:.88rem;
            margin-bottom:22px; transition:color .15s ease;
        }
        .auth-back:hover{ color:var(--simaksi-primary); }

        .auth-card{
            background:var(--simaksi-card);
            border:1px solid var(--simaksi-border);
            border-radius:var(--simaksi-radius);
            box-shadow:var(--simaksi-shadow);
            padding:2.4rem 2.2rem;
        }

        .auth-brand{ display:flex; align-items:center; gap:.65rem; margin-bottom:1.6rem; }
        .auth-brand-icon{
            width:44px; height:44px; border-radius:14px;
            background:linear-gradient(135deg, var(--simaksi-primary), var(--simaksi-primary-hover));
            display:flex; align-items:center; justify-content:center;
            color:#fff; font-size:1.15rem; box-shadow:0 8px 20px rgba(21,128,61,.28);
            flex-shrink:0; overflow:hidden;
        }
        .auth-brand-icon img{ width:100%; height:100%; object-fit:contain; }
        .auth-brand-name{ font-weight:800; font-size:1.05rem; letter-spacing:.1px; color:var(--simaksi-text); }
        .auth-brand-sub{ font-size:.78rem; color:var(--simaksi-muted); font-weight:500; }

        .auth-title{ font-size:1.5rem; font-weight:800; margin-bottom:.3rem; letter-spacing:-.01em; }
        .auth-subtitle{ font-size:.92rem; color:var(--simaksi-muted); margin-bottom:1.7rem; }

        .form-group{ margin-bottom:1.1rem; }
        .form-label{ display:block; font-weight:600; font-size:.85rem; color:var(--simaksi-text); margin-bottom:.4rem; }

        .input-wrap{ position:relative; }
        .input-wrap i.field-icon{
            position:absolute; left:14px; top:50%; transform:translateY(-50%);
            color:var(--simaksi-muted); font-size:.9rem; pointer-events:none;
        }

        .form-input{
            width:100%;
            padding:.75rem .95rem .75rem 2.5rem;
            border:1px solid var(--simaksi-border);
            border-radius:var(--simaksi-radius-sm);
            font-size:.92rem;
            font-family:inherit;
            min-height:46px;
            background:#fff;
            color:var(--simaksi-text);
            transition:border-color .15s ease, box-shadow .15s ease;
        }
        .form-input::placeholder{ color:#a3aeb8; }
        .form-input:focus{
            outline:none;
            border-color:var(--simaksi-primary);
            box-shadow:0 0 0 3px var(--simaksi-primary-soft);
        }

        .password-wrapper .form-input{ padding-right:2.6rem; }
        .toggle-password{
            position:absolute; right:14px; top:50%; transform:translateY(-50%);
            cursor:pointer; color:var(--simaksi-muted); font-size:.92rem; transition:color .15s ease;
        }
        .toggle-password:hover{ color:var(--simaksi-primary); }

        .remember-forgot{
            display:flex; justify-content:space-between; align-items:center;
            margin-bottom:1.4rem; font-size:.85rem;
        }
        .remember-me{ display:flex; align-items:center; gap:.45rem; cursor:pointer; color:var(--simaksi-muted); }
        .remember-me input[type="checkbox"]{ width:16px; height:16px; accent-color:var(--simaksi-primary); cursor:pointer; }
        .forgot-link{ color:var(--simaksi-primary); text-decoration:none; font-weight:600; }
        .forgot-link:hover{ text-decoration:underline; }

        .btn-login{
            width:100%;
            padding:.85rem 1rem;
            background:var(--simaksi-primary);
            color:#fff;
            border:none;
            border-radius:999px;
            font-size:.95rem;
            font-weight:700;
            font-family:inherit;
            cursor:pointer;
            transition:transform .12s ease, background .15s ease, box-shadow .15s ease;
            box-shadow:0 10px 24px rgba(21,128,61,.24);
        }
        .btn-login:hover{ background:var(--simaksi-primary-hover); transform:translateY(-1px); }
        .btn-login:active{ transform:translateY(0); }

        .divider{ display:flex; align-items:center; margin:1.5rem 0; color:var(--simaksi-muted); font-size:.82rem; }
        .divider::before, .divider::after{ content:''; flex:1; height:1px; background:var(--simaksi-border); }
        .divider span{ padding:0 .9rem; }

        .btn-google{
            display:flex; align-items:center; justify-content:center; gap:.6rem;
            width:100%; padding:.75rem 1rem;
            background:#fff; color:var(--simaksi-text);
            border:1px solid var(--simaksi-border);
            border-radius:var(--simaksi-radius-sm);
            text-decoration:none; font-weight:600; font-size:.9rem;
            transition:background .15s ease, border-color .15s ease;
        }
        .btn-google:hover{ background:#f8fafc; border-color:#cbd5e1; }

        .auth-footer-link{ text-align:center; color:var(--simaksi-muted); font-size:.88rem; margin-top:1.6rem; }
        .auth-footer-link a{ color:var(--simaksi-primary); font-weight:700; text-decoration:none; }
        .auth-footer-link a:hover{ text-decoration:underline; }

        .alert{
            padding:.75rem 1rem; border-radius:var(--simaksi-radius-sm); margin-bottom:1.1rem;
            display:flex; align-items:flex-start; gap:.6rem; font-size:.85rem; animation:slideDown .3s ease;
        }
        @keyframes slideDown{ from{ opacity:0; transform:translateY(-8px);} to{ opacity:1; transform:translateY(0);} }
        .alert-error{ background:#fef2f2; color:#b91c1c; border:1px solid #fecaca; }
        .alert-success{ background:#ecfdf3; color:#166534; border:1px solid #bbf0cf; }

        @media (max-width:480px){
            .auth-card{ padding:1.8rem 1.4rem; }
            .auth-title{ font-size:1.3rem; }
        }
    </style>
</head>
<body>
    <div class="auth-shell">
        <a href="{{ url('/') }}" class="auth-back"><i class="fa fa-arrow-left"></i> Kembali ke Beranda</a>

        <div class="auth-card">
            <div class="auth-brand">
                <span class="auth-brand-icon"><img src="{{ asset('images/logo.png') }}" alt="Logo SIMAKSI"></span>
                <div>
                    <div class="auth-brand-name">SIMAKSI.COM</div>
                    <div class="auth-brand-sub">Sistem Informasi Manajemen Pendakian</div>
                </div>
            </div>

            <h1 class="auth-title">Masuk ke akun Anda</h1>
            <p class="auth-subtitle">Kelola pendaftaran pendakian Anda dengan mudah.</p>

            {{-- Alert Error --}}
            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fa fa-circle-exclamation mt-1"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa fa-circle-check mt-1"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Alert Warning (dari middleware redirect) --}}
            @if(session('warning'))
                <div class="alert alert-error" id="warningAlert">
                    <i class="fa fa-triangle-exclamation mt-1"></i>
                    <span>{{ session('warning') }}</span>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" id="loginForm" novalidate>
                @csrf

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <i class="fa fa-envelope field-icon"></i>
                        <input type="email" name="email" class="form-input" placeholder="masukkan@email.com" required value="{{ old('email') }}" maxlength="100" autocomplete="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrap password-wrapper">
                        <i class="fa fa-lock field-icon"></i>
                        <input type="password" name="password" id="password" class="form-input" placeholder="••••••••" required autocomplete="current-password">
                        <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
                    </div>
                </div>

                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Ingat Saya</span>
                    </label>
                    <a href="#" class="forgot-link">Lupa Password?</a>
                </div>

                <button type="submit" class="btn-login"><i class="fa fa-right-to-bracket me-1"></i> Masuk</button>
            </form>

            <div class="divider"><span>atau</span></div>

            {{-- Google Login Button --}}
            <a href="{{ route('auth.google') }}" class="btn-google">
                <svg width="18" height="18" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Masuk dengan Google
            </a>

            <div class="auth-footer-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Tutup otomatis alert setelah 4 detik
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.transition = 'opacity 0.6s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 600);
            }
        }, 4000);

        document.getElementById('loginForm')?.addEventListener('submit', function (e) {
            const email = this.querySelector('input[name="email"]');
            if (!email) return;
            email.value = String(email.value || '').replace(/\s+/g, '');
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                e.preventDefault();
                Swal.fire({ icon: 'warning', title: 'Format email tidak valid.', confirmButtonColor: '#15803d' });
                email.focus();
            }
        });
    </script>
</body>
</html>
