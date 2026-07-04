<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMAKSI.COM')</title>

    {{-- ✅ Bootstrap CSS untuk Modal & Grid System --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome untuk Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            background: linear-gradient(90deg, #0e3d2c, #155c3b);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 999;
        }

        .navbar .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .navbar-brand img {
            height: 50px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .navbar-center {
            flex: 1;
            display: flex;
            justify-content: center;
            margin-left: 20px;
        }

        .nav-list {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-link {
            text-decoration: none;
            color: #e8f5e9;
            font-weight: 500;
            transition: 0.3s;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .nav-link:hover {
            color: #a8ffb0;
        }

        .nav-link.active {
            background: #28a745;
            color: white;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .btn-login {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1e7e34, #198754);
            color: white;
        }

        /* ================= SEARCH FORM ================= */
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
            background: #ffffff10;
            border: 1px solid #ffffff40;
            border-radius: 28px;
            padding: 2px 2px 2px 36px; /* space for left icon */
            transition: box-shadow .2s, background .2s, border-color .2s;
            width: 300px;
            backdrop-filter: blur(2px);
        }

        .search-container:focus-within {
            background: #ffffff20;
            border-color: #28a745;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.2);
        }

        .search-icon {
            position: absolute;
            left: 10px;
            color: #cfe9d6;
            font-size: 0.9rem;
            pointer-events: none;
        }

        .navbar-search-input {
            background: transparent;
            border: none;
            color: white;
            padding: 8px 40px 8px 0; /* space for clear button on the right */
            border-radius: 24px;
            font-size: 0.92rem;
            flex: 1;
            outline: none;
            min-width: 0; /* prevent overflow */
        }

        .navbar-search-input::placeholder { color: #e8f5e9; }

        .btn-clear-search {
            position: absolute;
            right: 60px; /* before search button */
            background: transparent;
            border: none;
            color: #e8f5e9;
            cursor: pointer;
            padding: 6px;
            border-radius: 50%;
            display: none;
        }
        .btn-clear-search:hover { background: #ffffff20; }

        .btn-search {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 24px;
            font-weight: 600;
            cursor: pointer;
            transition: transform .15s ease, box-shadow .2s;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-left: 8px;
            box-shadow: 0 4px 10px rgba(32, 201, 151, 0.25);
        }

        .btn-search:hover { background: linear-gradient(135deg, #218838, #198754); transform: translateY(-1px); }
        /* Hide legacy search form if still present */
        .navbar-right > form.d-inline:first-child { display: none !important; }

        .btn-search i {
            font-size: 0.8rem;
        }

        /* ================= MAIN CONTENT ================= */
        main {
            padding: 40px;
            max-width: 1200px;
            margin: 100px auto 60px auto;
        }

        footer {
            background: #0e3d2c;
            color: #e8f5e9;
            text-align: center;
            padding: 20px 0;
        }

        /* ================= MODAL CUSTOMIZATION ================= */
        .modal-backdrop {
            backdrop-filter: blur(8px);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-backdrop.show {
            opacity: 1;
        }

        .modal.fade .modal-dialog {
            transform: translateY(-50px);
            opacity: 0;
            transition: all 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: translateY(0);
            opacity: 1;
        }

        /* Modal Animation yang Smooth */
        .modal {
            transition: opacity 0.3s ease;
        }

        /* Ensure modal z-index is above navbar */
        .modal {
            z-index: 1050;
        }

        .modal-backdrop {
            z-index: 1040;
        }

        /* Custom scrollbar untuk modal */
        .modal-body::-webkit-scrollbar {
            width: 8px;
        }

        .modal-body::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Override Bootstrap button styles jika ada konflik */
        .btn {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar .container {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-center {
                margin-top: 10px;
            }

            .nav-list {
                flex-wrap: wrap;
                gap: 15px;
            }

            main {
                padding: 20px;
                margin-top: 120px;
            }

            /* Modal responsive */
            .modal-dialog {
                margin: 0.5rem;
            }
            .search-container { width: 100%; }
        }

        /* Animasi untuk button hover di modal */
        .modal .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .modal .btn {
            transition: all 0.2s ease;
        }
        main {
            overflow: visible !important;
            background: transparent !important;
        }

    </style>

    {{-- Custom CSS dari halaman child --}}
    @stack('styles')
</head>
<body>

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar">
        <div class="container">
            <!-- LEFT -->
            <div class="navbar-left">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                    SIMAKSI.COM
                </a>
            </div>

            <!-- CENTER -->
            <div class="navbar-center">
                <ul class="nav-list">
                    <li>
                        @auth
                            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                               class="nav-link {{ request()->is('user/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
                                Home
                            </a>
                        @else
                            <a href="{{ route('landing') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        @endauth
                    </li>
                    <li><a href="{{ route('gunung.index') }}" class="nav-link {{ request()->is('gunung') ? 'active' : '' }}">Gunung</a></li>
                    <li><a href="{{ route('rute_pendakian.index') }}" class="nav-link {{ request()->is('rute') ? 'active' : '' }}">Rute</a></li>
                    <li><a href="{{ route('panduan') }}" class="nav-link {{ request()->is('panduan') ? 'active' : '' }}">Panduan</a></li>
                    <li><a href="{{ route('tentang') }}" class="nav-link {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a></li>
                    <li><a href="{{ route('pendaftaran.index') }}" class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}">Isi Formulir SIMAKSI</a></li>
                </ul>
            </div>

            <!-- RIGHT -->
            <div class="navbar-right">
                {{-- 🔍 Form pencarian gunung (bisa digunakan semua user) --}}
                <form action="{{ route('gunung.search') }}" method="GET" class="d-inline" style="margin-right: 15px; display:none;">
                    <div class="search-container">
                        <input type="text" name="q" value="{{ request()->get('q') ?? '' }}" placeholder="🔍 Cari Gunung..." class="navbar-search-input" autocomplete="off">
                        <button type="submit" class="btn-search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Enhanced Search UI -->
                <form action="{{ route('gunung.search') }}" method="GET" class="d-inline" style="margin-right: 15px;">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input id="navbarSearchInput" type="text" name="q" value="{{ request()->get('q') ?? '' }}" placeholder="Cari Gunung..." class="navbar-search-input" autocomplete="off">
                        <button id="navbarSearchClear" type="button" class="btn-clear-search" aria-label="Hapus">
                            <i class="fas fa-times"></i>
                        </button>
                        <button type="submit" class="btn-search">
                            <i class="fas fa-search"></i>
                            <span class="d-none d-md-inline">Cari</span>
                        </button>
                    </div>
                </form>

                @auth
                    {{-- Tombol logout --}}
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-login" style="background: linear-gradient(135deg, #dc3545, #c82333);">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    <!-- ================= CONTENT ================= -->
    <main>
        @yield('content')
    </main>

    <!-- ================= FOOTER ================= -->
    <footer>
        &copy; {{ date('Y') }} SIMAKSI.COM — Jelajahi Alam Indonesia dengan Aman 🌲
    </footer>

    {{-- ✅ Bootstrap JS untuk Modal & Components --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        window.notify = function(type, title, text, options = {}) {
            const base = {
                icon: type,
                title: title || '',
                text: text || '',
                confirmButtonColor: '#28a745'
            };
            return Swal.fire(Object.assign(base, options));
        };
        window.toast = function(type, title, timer = 2600) {
            return Swal.fire({ toast: true, position: 'top-end', icon: type, title: title, showConfirmButton: false, timer: timer, timerProgressBar: true });
        };
    </script>
    <script>
        (function(){
            const originalAlert = window.alert;
            window.alert = function(message){
                try {
                    const msg = String(message || '');
                    const lower = msg.toLowerCase();
                    let icon = 'info';
                    if (lower.includes('berhasil') || lower.includes('success')) icon = 'success';
                    else if (lower.includes('gagal') || lower.includes('error') || lower.includes('kesalahan')) icon = 'error';
                    else if (lower.includes('tutup') || lower.includes('warning') || lower.includes('peringatan')) icon = 'warning';
                    Swal.fire({ icon, title: msg, confirmButtonColor: '#28a745' });
                } catch (e) { originalAlert(message); }
            };
        })();
    </script>

    {{-- Custom Scripts dari halaman child --}}
    @stack('scripts')

    {{-- Script untuk smooth modal animation --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth animation untuk semua modal
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.addEventListener('show.bs.modal', function() {
                    document.body.style.overflow = 'hidden';
                });
                
                modal.addEventListener('hidden.bs.modal', function() {
                    document.body.style.overflow = 'auto';
                });
            });

            // Auto hide alerts setelah 5 detik
            const alerts = document.querySelectorAll('.alert-success, .alert-danger, .alert-warning');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            });

            // Search clear button logic
            const input = document.getElementById('navbarSearchInput');
            const clearBtn = document.getElementById('navbarSearchClear');
            function updateClear(){ if(clearBtn){ clearBtn.style.display = input && input.value ? 'inline-flex' : 'none'; } }
            if (input){
                updateClear();
                input.addEventListener('input', updateClear);
                input.addEventListener('keydown', (e)=>{ if(e.key==='Escape'){ input.value=''; input.focus(); updateClear(); }});
            }
            if (clearBtn){
                clearBtn.addEventListener('click', ()=>{ input.value=''; input.focus(); updateClear(); });
            }
        });
    </script>
<script>
document.addEventListener('hidden.bs.modal', function () {
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    document.body.classList.remove('modal-open');
    document.body.style.overflow = 'auto';
});
</script>


</body>
</html>
