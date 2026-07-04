<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Simaksi Gunung</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #104734, #228B22);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            width: 100%;
            max-width: 550px;
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .register-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }
        
        .register-header {
            background: linear-gradient(135deg, #104734, #228B22);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            backdrop-filter: blur(10px);
        }
        
        .register-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .register-subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
        }
        
        .register-body {
            padding: 40px 30px;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .register-body::-webkit-scrollbar {
            width: 8px;
        }
        
        .register-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .register-body::-webkit-scrollbar-thumb {
            background: #28a745;
            border-radius: 10px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-label {
            display: block;
            color: #104734;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .form-label .required {
            color: #dc3545;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 18px;
            border: 2px solid #e8f5e9;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #28a745;
            background: white;
            box-shadow: 0 0 0 4px rgba(40, 167, 69, 0.1);
        }
        
        .form-input.error {
            border-color: #dc3545;
            background: #fff5f5;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .password-wrapper {
            position: relative;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2rem;
            color: #6c757d;
            transition: color 0.3s ease;
        }
        
        .toggle-password:hover {
            color: #28a745;
        }
        
        .password-strength {
            height: 4px;
            background: #e8f5e9;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .password-strength-bar.weak {
            width: 33%;
            background: #dc3545;
        }
        
        .password-strength-bar.medium {
            width: 66%;
            background: #ffc107;
        }
        
        .password-strength-bar.strong {
            width: 100%;
            background: #28a745;
        }
        
        .password-hint {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }
        
        textarea.form-input {
            min-height: 80px;
            resize: vertical;
        }
        
        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 25px;
        }
        
        .terms-checkbox input[type="checkbox"] {
            margin-top: 3px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .terms-checkbox label {
            font-size: 0.9rem;
            color: #6c757d;
            cursor: pointer;
        }
        
        .terms-checkbox a {
            color: #28a745;
            text-decoration: none;
            font-weight: 600;
        }
        
        .terms-checkbox a:hover {
            text-decoration: underline;
        }
        
        .btn-register {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(40, 167, 69, 0.4);
        }
        
        .btn-register:active {
            transform: translateY(-1px);
        }
        
        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e8f5e9;
        }
        
        .divider span {
            padding: 0 15px;
        }
        
        .login-link {
            text-align: center;
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .login-link a {
            color: #28a745;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
            color: #218838;
            text-decoration: underline;
        }
        
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.4s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-error {
            background: #f8d7da;
            border: 2px solid #dc3545;
            color: #721c24;
        }
        
        .alert-success {
            background: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
        }
        
        .back-home {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-home a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .back-home a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .register-body {
                padding: 30px 20px;
            }
            
            .register-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Simaksi" style="width:80px;height:80px;object-fit:contain;">
                </div>
                <h1 class="register-title">Daftar Akun</h1>
                <p class="register-subtitle">Simaksi Gunung</p>
            </div>
            
            <div class="register-body">
                {{-- Alert Info untuk Google OAuth --}}
                @if(session('info'))
                    <div class="alert alert-success">
                        <span>ℹ️</span>
                        <span>{{ session('info') }}</span>
                    </div>
                @endif

                {{-- Alert Error --}}
                @if($errors->any())
                    <div class="alert alert-error">
                        <span>⚠️</span>
                        <div>
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('register.post') }}" method="POST" id="registerForm">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">
                            Nama Lengkap <span class="required">*</span>
                        </label>
                        <input type="text" name="nama_lengkap" class="form-input" 
                               placeholder="Masukkan nama lengkap" 
                               required 
                               value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                            <div class="error-message">⚠️ {{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                Email <span class="required">*</span>
                            </label>
                        <input type="email" name="email" class="form-input"
                               placeholder="contoh@email.com"
                               required
                               value="{{ old('email', session('google_user.email') ?? '') }}">
                            @error('email')
                                <div class="error-message">⚠️ {{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                No. Telepon <span class="required">*</span>
                            </label>
                            <input type="tel" name="no_telepon" class="form-input" 
                                   placeholder="08123456789" 
                                   required 
                                   value="{{ old('no_telepon') }}">
                            @error('no_telepon')
                                <div class="error-message">⚠️ {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            Alamat <span class="required">*</span>
                        </label>
                        <textarea name="alamat" class="form-input" 
                                  placeholder="Masukkan alamat lengkap" 
                                  required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="error-message">⚠️ {{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                Password <span class="required">*</span>
                            </label>
                            <div class="password-wrapper">
                                <input type="password" name="password" id="password" 
                                       class="form-input" 
                                       placeholder="Minimal 6 karakter" 
                                       required
                                       onkeyup="checkPasswordStrength()">
                                <span class="toggle-password" onclick="togglePassword('password')">👁️</span>
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="strengthBar"></div>
                            </div>
                            <div class="password-hint" id="strengthText">Masukkan password</div>
                            @error('password')
                                <div class="error-message">⚠️ {{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                Konfirmasi Password <span class="required">*</span>
                            </label>
                            <div class="password-wrapper">
                                <input type="password" name="password_confirmation" 
                                       id="password_confirmation" 
                                       class="form-input" 
                                       placeholder="Ulangi password" 
                                       required>
                                <span class="toggle-password" onclick="togglePassword('password_confirmation')">👁️</span>
                            </div>
                            @error('password_confirmation')
                                <div class="error-message">⚠️ {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="terms-checkbox">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">
                            Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan 
                            <a href="#">Kebijakan Privasi</a> Simaksi Gunung
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-register" id="btnSubmit">
                        🚀 Daftar Sekarang
                    </button>
                </form>
                
                <div class="divider">
                    <span>atau</span>
                </div>
                
                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Login Sekarang</a>
                </div>
            </div>
        </div>
        
        <div class="back-home">
            <a href="{{ url('/') }}">
                <span>←</span> Kembali ke Beranda
            </a>
        </div>
    </div>
    
    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = event.target;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = '👁️';
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
                strengthText.textContent = '❌ Password lemah';
                strengthText.style.color = '#dc3545';
            } else if (strength <= 4) {
                strengthBar.classList.add('medium');
                strengthText.textContent = '⚠️ Password sedang';
                strengthText.style.color = '#ffc107';
            } else {
                strengthBar.classList.add('strong');
                strengthText.textContent = '✅ Password kuat';
                strengthText.style.color = '#28a745';
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
            document.getElementById('btnSubmit').textContent = '⏳ Mendaftar...';
        });
        // Fallback: override alert() menjadi SweetAlert jika dipanggil
        (function(){
            const originalAlert = window.alert;
            window.alert = function(message){
                try { Swal.fire({ icon: 'info', title: String(message || '') }); } catch(e) { originalAlert(message); }
            };
        })();
    </script>
</body>
</html>
