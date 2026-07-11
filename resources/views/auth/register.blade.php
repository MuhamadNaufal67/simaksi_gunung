<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - SIMAKSI.COM</title>

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

        .auth-shell{ width:100%; max-width:560px; animation:slideUp .5s ease; }

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

        .auth-body{ max-height:76vh; overflow-y:auto; padding-right:.3rem; }
        .auth-body::-webkit-scrollbar{ width:6px; }
        .auth-body::-webkit-scrollbar-track{ background:transparent; }
        .auth-body::-webkit-scrollbar-thumb{ background:var(--simaksi-border); border-radius:10px; }

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

        .form-row{ display:grid; grid-template-columns:1fr 1fr; gap:1rem; }
        .form-group{ margin-bottom:1.1rem; }
        .form-group.full-width{ grid-column:1 / -1; }
        .form-label{ display:block; font-weight:600; font-size:.85rem; color:var(--simaksi-text); margin-bottom:.4rem; }
        .form-label .required{ color:#dc2626; }

        .input-wrap{ position:relative; }
        .input-wrap i.field-icon{
            position:absolute; left:14px; top:14px;
            color:var(--simaksi-muted); font-size:.9rem; pointer-events:none;
        }

        .form-input{
            width:100%;
            padding:.7rem .9rem .7rem 2.5rem;
            border:1px solid var(--simaksi-border);
            border-radius:var(--simaksi-radius-sm);
            font-size:.9rem;
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
        .form-input.error, .form-input.is-invalid{
            border-color:#dc2626;
            background:#fef2f2;
        }
        textarea.form-input{ min-height:80px; resize:vertical; padding-top:.7rem; }
        textarea.form-input ~ .field-icon{ top:16px; }

        .error-message{
            color:#dc2626; font-size:.8rem; margin-top:.35rem;
            display:flex; align-items:center; gap:.35rem;
        }

        .password-wrapper .form-input{ padding-right:2.6rem; }
        .toggle-password{
            position:absolute; right:14px; top:14px;
            cursor:pointer; color:var(--simaksi-muted); font-size:.92rem; transition:color .15s ease;
        }
        .toggle-password:hover{ color:var(--simaksi-primary); }

        .password-strength{ height:4px; background:var(--simaksi-border); border-radius:2px; margin-top:.5rem; overflow:hidden; }
        .password-strength-bar{ height:100%; width:0; transition:all .3s ease; border-radius:2px; }
        .password-strength-bar.weak{ width:33%; background:#dc2626; }
        .password-strength-bar.medium{ width:66%; background:#d97706; }
        .password-strength-bar.strong{ width:100%; background:var(--simaksi-primary); }
        .password-hint{ font-size:.78rem; color:var(--simaksi-muted); margin-top:.35rem; }

        .terms-checkbox{ display:flex; align-items:flex-start; gap:.6rem; margin-bottom:1.4rem; }
        .terms-checkbox input[type="checkbox"]{ margin-top:.2rem; width:16px; height:16px; accent-color:var(--simaksi-primary); cursor:pointer; }
        .terms-checkbox label{ font-size:.85rem; color:var(--simaksi-muted); cursor:pointer; }
        .terms-checkbox a{ color:var(--simaksi-primary); text-decoration:none; font-weight:600; }
        .terms-checkbox a:hover{ text-decoration:underline; }

        .btn-register{
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
        .btn-register:hover{ background:var(--simaksi-primary-hover); transform:translateY(-1px); }
        .btn-register:active{ transform:translateY(0); }
        .btn-register:disabled{ opacity:.6; cursor:not-allowed; transform:none; }

        .divider{ display:flex; align-items:center; margin:1.4rem 0; color:var(--simaksi-muted); font-size:.82rem; }
        .divider::before, .divider::after{ content:''; flex:1; height:1px; background:var(--simaksi-border); }
        .divider span{ padding:0 .9rem; }

        .auth-footer-link{ text-align:center; color:var(--simaksi-muted); font-size:.88rem; }
        .auth-footer-link a{ color:var(--simaksi-primary); font-weight:700; text-decoration:none; }
        .auth-footer-link a:hover{ text-decoration:underline; }

        .alert{
            padding:.75rem 1rem; border-radius:var(--simaksi-radius-sm); margin-bottom:1.1rem;
            display:flex; align-items:flex-start; gap:.6rem; font-size:.85rem; animation:slideDown .3s ease;
        }
        @keyframes slideDown{ from{ opacity:0; transform:translateY(-8px);} to{ opacity:1; transform:translateY(0);} }
        .alert-error{ background:#fef2f2; color:#b91c1c; border:1px solid #fecaca; }
        .alert-success{ background:#ecfdf3; color:#166534; border:1px solid #bbf0cf; }

        @media (max-width:768px){
            .form-row{ grid-template-columns:1fr; }
        }
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

            <h1 class="auth-title">Buat akun baru</h1>
            <p class="auth-subtitle">Daftar untuk mulai mengajukan izin pendakian.</p>

            <div class="auth-body">
                {{-- Alert Info untuk Google OAuth --}}
                @if(session('info'))
                    <div class="alert alert-success">
                        <i class="fa fa-circle-info mt-1"></i>
                        <span>{{ session('info') }}</span>
                    </div>
                @endif

                {{-- Alert Error --}}
                @if($errors->any())
                    <div class="alert alert-error">
                        <i class="fa fa-circle-exclamation mt-1"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route('register.post') }}" method="POST" id="registerForm" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                        <div class="input-wrap">
                            <i class="fa fa-user field-icon"></i>
                            <input type="text" name="nama_lengkap" class="form-input"
                                   placeholder="Masukkan nama lengkap"
                                   required
                                   minlength="3"
                                   maxlength="100"
                                   autocomplete="name"
                                   value="{{ old('nama_lengkap') }}">
                        </div>
                        @error('nama_lengkap')
                            <div class="error-message"><i class="fa fa-triangle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-envelope field-icon"></i>
                                <input type="email" name="email" class="form-input"
                                       placeholder="contoh@email.com"
                                       required
                                       maxlength="100"
                                       autocomplete="email"
                                       value="{{ old('email', session('google_user.email') ?? '') }}">
                            </div>
                            @error('email')
                                <div class="error-message"><i class="fa fa-triangle-exclamation"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Telepon <span class="required">*</span></label>
                            <div class="input-wrap">
                                <i class="fa fa-phone field-icon"></i>
                                <input type="tel" name="no_telepon" class="form-input"
                                       placeholder="08123456789"
                                       required
                                       minlength="10"
                                       maxlength="15"
                                       inputmode="numeric"
                                       pattern="[0-9]{10,15}"
                                       autocomplete="tel"
                                       value="{{ old('no_telepon') }}">
                            </div>
                            @error('no_telepon')
                                <div class="error-message"><i class="fa fa-triangle-exclamation"></i> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Alamat <span class="required">*</span></label>
                        <div class="input-wrap">
                            <i class="fa fa-location-dot field-icon"></i>
                            <textarea name="alamat" class="form-input"
                                      placeholder="Masukkan alamat lengkap"
                                      maxlength="255"
                                      required>{{ old('alamat') }}</textarea>
                        </div>
                        @error('alamat')
                            <div class="error-message"><i class="fa fa-triangle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Password <span class="required">*</span></label>
                            <div class="input-wrap password-wrapper">
                                <i class="fa fa-lock field-icon"></i>
                                <input type="password" name="password" id="password"
                                       class="form-input"
                                       placeholder="Minimal 6 karakter"
                                       required
                                       onkeyup="checkPasswordStrength()">
                                <i class="fa fa-eye toggle-password" onclick="togglePassword('password')"></i>
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="strengthBar"></div>
                            </div>
                            <div class="password-hint" id="strengthText">Masukkan password</div>
                            @error('password')
                                <div class="error-message"><i class="fa fa-triangle-exclamation"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Konfirmasi Password <span class="required">*</span></label>
                            <div class="input-wrap password-wrapper">
                                <i class="fa fa-lock field-icon"></i>
                                <input type="password" name="password_confirmation"
                                       id="password_confirmation"
                                       class="form-input"
                                       placeholder="Ulangi password"
                                       required>
                                <i class="fa fa-eye toggle-password" onclick="togglePassword('password_confirmation')"></i>
                            </div>
                            @error('password_confirmation')
                                <div class="error-message"><i class="fa fa-triangle-exclamation"></i> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="terms-checkbox">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">
                            Saya menyetujui <a href="#">Syarat &amp; Ketentuan</a> dan
                            <a href="#">Kebijakan Privasi</a> SIMAKSI.COM
                        </label>
                    </div>

                    <button type="submit" class="btn-register" id="btnSubmit">
                        <i class="fa fa-user-plus me-1"></i> Daftar Sekarang
                    </button>
                </form>

                <div class="divider"><span>atau</span></div>

                <div class="auth-footer-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = event.target.closest('.toggle-password');

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

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('strengthBar');
            const strengthText = document.getElementById('strengthText');

            // Reset
            strengthBar.className = 'password-strength-bar';

            if (password.length === 0) {
                strengthText.textContent = 'Masukkan password';
                return;
            }

            let strength = 0;

            // Check length
            if (password.length >= 6) strength++;
            if (password.length >= 10) strength++;

            // Check for numbers
            if (/\d/.test(password)) strength++;

            // Check for uppercase
            if (/[A-Z]/.test(password)) strength++;

            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            // Set strength
            if (strength <= 2) {
                strengthBar.classList.add('weak');
                strengthText.textContent = 'Password lemah';
                strengthText.style.color = '#dc2626';
            } else if (strength <= 4) {
                strengthBar.classList.add('medium');
                strengthText.textContent = 'Password sedang';
                strengthText.style.color = '#d97706';
            } else {
                strengthBar.classList.add('strong');
                strengthText.textContent = 'Password kuat';
                strengthText.style.color = '#15803d';
            }
        }

        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;

            if (password !== confirmPassword) {
                e.preventDefault();
                Swal.fire({ icon: 'warning', title: 'Validasi Gagal', text: 'Password dan konfirmasi password tidak sama!' });
                return false;
            }

            if (!terms) {
                e.preventDefault();
                Swal.fire({ icon: 'info', title: 'Perlu Persetujuan', text: 'Anda harus menyetujui Syarat & Ketentuan!' });
                return false;
            }

            // Disable button to prevent double submit
            document.getElementById('btnSubmit').disabled = true;
            document.getElementById('btnSubmit').innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Mendaftar...';
        });
        // Fallback: override alert() menjadi SweetAlert jika dipanggil
        (function(){
            const originalAlert = window.alert;
            window.alert = function(message){
                try { Swal.fire({ icon: 'info', title: String(message || '') }); } catch(e) { originalAlert(message); }
            };
        })();
    </script>
    <script>
        (function () {
            const form = document.getElementById('registerForm');
            if (!form) return;

            function setFieldError(field, message) {
                field.classList.add('is-invalid', 'error');
                field.setCustomValidity(message);
                let error = field.parentElement.parentElement.querySelector('.client-error');
                if (!error) {
                    error = document.createElement('div');
                    error.className = 'error-message client-error';
                    field.parentElement.parentElement.appendChild(error);
                }
                error.innerHTML = '<i class="fa fa-triangle-exclamation"></i> ' + message;
            }

            function clearFieldError(field) {
                field.classList.remove('is-invalid', 'error');
                field.setCustomValidity('');
                const error = field.parentElement.parentElement.querySelector('.client-error');
                if (error) error.remove();
            }

            function normalizeName(value) {
                return String(value || '').replace(/[^A-Za-z\s'.-]/g, '').replace(/\s+/g, ' ').trim();
            }

            function validateField(field) {
                if (field.name === 'nama_lengkap') {
                    field.value = normalizeName(field.value);
                    if (field.value.length < 3) return setFieldError(field, 'Nama lengkap minimal 3 karakter.'), false;
                    if (/^\d+$/.test(field.value) || !/[A-Za-z]/.test(field.value)) return setFieldError(field, 'Nama lengkap harus mengandung huruf.'), false;
                }

                if (field.name === 'email') {
                    field.value = String(field.value || '').replace(/\s+/g, '');
                    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) return setFieldError(field, 'Format email tidak valid.'), false;
                }

                if (field.name === 'no_telepon') {
                    field.value = String(field.value || '').replace(/\D/g, '').slice(0, 15);
                    if (!/^\d{10,15}$/.test(field.value)) return setFieldError(field, 'Nomor HP harus 10-15 digit angka.'), false;
                }

                clearFieldError(field);
                return true;
            }

            ['nama_lengkap', 'email', 'no_telepon'].forEach((name) => {
                const field = form.querySelector(`[name="${name}"]`);
                if (!field) return;
                field.addEventListener('input', () => validateField(field));
                field.addEventListener('blur', () => validateField(field));
            });

            form.addEventListener('submit', function (e) {
                if (form.dataset.confirmed === 'true') {
                    delete form.dataset.confirmed;
                    return;
                }

                const fields = ['nama_lengkap', 'email', 'no_telepon']
                    .map((name) => form.querySelector(`[name="${name}"]`))
                    .filter(Boolean);

                for (const field of fields) {
                    if (!validateField(field)) {
                        e.preventDefault();
                        e.stopImmediatePropagation();
                        field.focus();
                        Swal.fire({ icon: 'warning', title: 'Validasi Gagal', text: 'Periksa kembali data yang masih tidak valid.' });
                        return;
                    }
                }

                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('password_confirmation').value;
                const terms = document.getElementById('terms').checked;

                if (password !== confirmPassword) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    Swal.fire({ icon: 'warning', title: 'Validasi Gagal', text: 'Password dan konfirmasi password tidak sama!' });
                    return;
                }

                if (!terms) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                    Swal.fire({ icon: 'info', title: 'Perlu Persetujuan', text: 'Anda harus menyetujui Syarat & Ketentuan!' });
                    return;
                }

                e.preventDefault();
                e.stopImmediatePropagation();
                Swal.fire({
                    icon: 'question',
                    title: 'Konfirmasi Pendaftaran',
                    text: 'Pastikan data akun yang Anda isi sudah benar.',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, daftar',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#15803d'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.dataset.confirmed = 'true';
                        document.getElementById('btnSubmit').disabled = true;
                        document.getElementById('btnSubmit').innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Mendaftar...';
                        form.requestSubmit ? form.requestSubmit() : form.submit();
                    }
                });
            }, true);
        })();
    </script>
</body>
</html>
