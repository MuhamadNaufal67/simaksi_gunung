<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMAKSI.COM')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    {{-- Minimal theme via CSS variables (no inline styling in markup) --}}
    <style>
        :root{
            --simaksi-primary:#155c3b;
            --simaksi-primary-2:#28a745;
            --simaksi-bg:#f6f7f8;
            --simaksi-text:#0f172a;
            --simaksi-muted:#6b7280;
            --simaksi-card:#ffffff;
            --simaksi-border:rgba(15,23,42,.12);
            --simaksi-radius:16px;
        }
        body{background:var(--simaksi-bg); font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:var(--simaksi-text);} 
        .app-navbar{background:linear-gradient(90deg,var(--simaksi-primary),#0e3d2c); box-shadow:0 6px 22px rgba(0,0,0,.10);}
        .app-navbar .navbar-brand{font-weight:800; letter-spacing:.2px;}
        .app-navbar-nav .nav-link{color:rgba(232,245,233,.92); padding:.5rem .85rem; border-radius:999px; font-weight:600; font-size:.95rem;}

        .app-navbar .nav-link:hover{color:#b9f6c1; background:rgba(255,255,255,.08);} 
        .app-navbar .nav-link.active{background:#28a745; color:#fff;}
        .btn-simaksi-primary{background:linear-gradient(135deg,var(--simaksi-primary-2),#20c997); border:0; font-weight:700; border-radius:999px;}
        .btn-simaksi-primary:hover{filter:brightness(.95);} 
        main{padding:32px 0 48px 0;}
        .app-content{max-width:1200px;margin:0 auto;}

        footer{background:#0e3d2c; color:#e8f5e9; text-align:center; padding:18px 0;}
        .card-simaksi{background:var(--simaksi-card); border:1px solid var(--simaksi-border); border-radius:var(--simaksi-radius); box-shadow:0 6px 22px rgba(15,23,42,.04);} 
        .search-container{position:relative;display:flex;align-items:center;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.20);border-radius:28px;padding:2px 2px 2px 36px;width:300px;backdrop-filter:blur(2px);} 
        .search-container:focus-within{background:rgba(255,255,255,.14);border-color:rgba(40,167,69,.9); box-shadow:0 0 0 3px rgba(40,167,69,.20);} 
        .search-icon{position:absolute;left:10px;color:#cfe9d6;font-size:.9rem;pointer-events:none;} 
        .navbar-search-input{background:transparent;border:none;color:#fff;padding:8px 48px 8px 0;border-radius:24px;font-size:.92rem;flex:1;outline:none;min-width:0;} 
        .navbar-search-input::placeholder{color:#e8f5e9;} 
        .btn-clear-search{position:absolute;right:54px;background:transparent;border:none;color:#e8f5e9;cursor:pointer;padding:6px;border-radius:50%;display:none;} 
        .btn-clear-search:hover{background:rgba(255,255,255,.14);} 
        .btn-search{background:linear-gradient(135deg,var(--simaksi-primary-2),#20c997);color:#fff;border:none;padding:8px 14px;border-radius:24px;font-weight:700;cursor:pointer;transition:transform .15s ease,box-shadow .2s;box-shadow:0 4px 10px rgba(32,201,151,.25);display:inline-flex;align-items:center;gap:6px;} 
        .btn-search:hover{filter:brightness(.95);transform:translateY(-1px);} 

        .badge-simaksi{border-radius:999px; font-weight:700;}
        .simaksi-logo{height:42px;border-radius:10px;}

        @media (max-width: 576px){
            .app-navbar .nav{gap:.25rem;}
            .search-container{width:100%;}
        }

    </style>

    @stack('styles')
</head>
<body>

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar app-navbar">
        <div class="container"> 
            <div class="d-flex align-items-center justify-content-between w-100">

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ url('/') }}" class="navbar-brand text-white text-decoration-none d-flex align-items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="simaksi-logo">
                        <span class="d-none d-md-inline">SIMAKSI.COM</span>
                    </a>
                </div>


                <div class="d-none d-lg-flex align-items-center">
                    <ul class="nav app-navbar-nav">
                        <li class="nav-item">
                            @auth
                                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="nav-link {{ request()->is('user/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">Home</a>
                            @else
                                <a href="{{ route('landing') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                            @endauth
                        </li>
                        <li class="nav-item"><a href="{{ route('gunung.index') }}" class="nav-link {{ request()->is('gunung') ? 'active' : '' }}">Gunung</a></li>
                        <li class="nav-item"><a href="{{ route('rute_pendakian.index') }}" class="nav-link {{ request()->is('rute') ? 'active' : '' }}">Rute</a></li>
                        <li class="nav-item"><a href="{{ route('panduan') }}" class="nav-link {{ request()->is('panduan') ? 'active' : '' }}">Panduan</a></li>
                        <li class="nav-item"><a href="{{ route('tentang') }}" class="nav-link {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a></li>
                        <li class="nav-item"><a href="{{ route('pendaftaran.index') }}" class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}">Isi Formulir SIMAKSI</a></li>
                    </ul>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <form action="{{ route('gunung.search') }}" method="GET" class="d-none d-md-inline">
                        <div class="search-container">

                            <i class="fas fa-search search-icon"></i>
                            <input id="navbarSearchInput" type="text" name="q" value="{{ request()->get('q') ?? '' }}" placeholder="Cari Gunung..." class="navbar-search-input" autocomplete="off">
                            <button id="navbarSearchClear" type="button" class="btn-clear-search" aria-label="Hapus">
                                <i class="fas fa-times"></i>
                            </button>
                            <button type="submit" class="btn-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger fw-bold"> <i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-simaksi-primary text-white"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- ================= CONTENT ================= -->
    <main>
        <div class="app-content">
            @yield('content')
        </div>
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
