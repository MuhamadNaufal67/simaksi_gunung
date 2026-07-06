<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMAKSI.COM')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    {{-- Theme via CSS variables (no inline styling in markup) --}}
    <style>
        :root{
            --simaksi-primary:#0f4c33;
            --simaksi-primary-2:#28a745;
            --simaksi-accent:#20c997;
            --simaksi-bg:#f5f7f6;
            --simaksi-text:#0f172a;
            --simaksi-muted:#64748b;
            --simaksi-card:#ffffff;
            --simaksi-border:rgba(15,23,42,.10);
            --simaksi-radius:18px;
            --simaksi-radius-sm:12px;
        }

        *{box-sizing:border-box;}

        body{
            background:var(--simaksi-bg);
            font-family:'Plus Jakarta Sans','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color:var(--simaksi-text);
        }

        h1,h2,h3,h4,h5,h6{font-weight:700; letter-spacing:-.01em;}

        /* ================= NAVBAR ================= */
        .app-navbar{
            background:linear-gradient(100deg,var(--simaksi-primary) 0%,#0a3322 100%);
            box-shadow:0 4px 24px rgba(6,30,20,.18);
            position:sticky;
            top:0;
            z-index:1030;
            padding:.65rem 0;
        }
        .app-navbar .navbar-brand{font-weight:800; letter-spacing:.2px; font-size:1.15rem;}
        .app-navbar-nav .nav-link{
            color:rgba(232,245,233,.92);
            padding:.5rem .9rem;
            border-radius:999px;
            font-weight:600;
            font-size:.93rem;
            transition:background .18s ease,color .18s ease;
            white-space:nowrap;
        }
        .app-navbar-nav .nav-link:hover{color:#c6ffd0; background:rgba(255,255,255,.08);}
        .app-navbar-nav .nav-link.active{background:var(--simaksi-primary-2); color:#fff; box-shadow:0 4px 12px rgba(40,167,69,.35);}

        .navbar-toggler-simaksi{
            background:rgba(255,255,255,.10);
            border:1px solid rgba(255,255,255,.25);
            border-radius:10px;
            color:#fff;
            padding:.4rem .65rem;
        }
        .navbar-toggler-simaksi:hover{background:rgba(255,255,255,.18);}

        .btn-simaksi-primary{background:linear-gradient(135deg,var(--simaksi-primary-2),var(--simaksi-accent)); border:0; font-weight:700; border-radius:999px; box-shadow:0 4px 14px rgba(32,201,151,.28);}
        .btn-simaksi-primary:hover{filter:brightness(.96); color:#fff;}

        main{padding:36px 0 56px 0;}
        .app-content{max-width:1200px;margin:0 auto; padding:0 1rem;}

        footer{background:#0a3322; color:#e8f5e9; text-align:center; padding:22px 0; font-size:.92rem;}
        footer a{color:#b9f6c1;}

        .card-simaksi{background:var(--simaksi-card); border:1px solid var(--simaksi-border); border-radius:var(--simaksi-radius); box-shadow:0 8px 26px rgba(15,23,42,.05); transition:transform .18s ease, box-shadow .18s ease;}
        .card-simaksi:hover{transform:translateY(-2px); box-shadow:0 14px 32px rgba(15,23,42,.08);}

        /* Search */
        .search-container{position:relative;display:flex;align-items:center;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.20);border-radius:28px;padding:2px 2px 2px 36px;width:280px;backdrop-filter:blur(2px);}
        .search-container:focus-within{background:rgba(255,255,255,.14);border-color:rgba(40,167,69,.9); box-shadow:0 0 0 3px rgba(40,167,69,.20);}
        .search-icon{position:absolute;left:12px;color:#cfe9d6;font-size:.85rem;pointer-events:none;}
        .navbar-search-input{background:transparent;border:none;color:#fff;padding:8px 48px 8px 0;border-radius:24px;font-size:.9rem;flex:1;outline:none;min-width:0;}
        .navbar-search-input::placeholder{color:#cfe9d6;}
        .btn-clear-search{position:absolute;right:54px;background:transparent;border:none;color:#e8f5e9;cursor:pointer;padding:6px;border-radius:50%;display:none;}
        .btn-clear-search:hover{background:rgba(255,255,255,.14);}
        .btn-search{background:linear-gradient(135deg,var(--simaksi-primary-2),var(--simaksi-accent));color:#fff;border:none;padding:8px 14px;border-radius:24px;font-weight:700;cursor:pointer;transition:transform .15s ease,box-shadow .2s;box-shadow:0 4px 10px rgba(32,201,151,.25);display:inline-flex;align-items:center;gap:6px;}
        .btn-search:hover{filter:brightness(.95);transform:translateY(-1px);}

        .badge-simaksi{border-radius:999px; font-weight:700;}
        .simaksi-logo{height:40px;border-radius:10px;}

        /* Mobile collapse panel */
        @media (max-width: 991.98px){
            .app-navbar-collapse{
                background:rgba(10,51,34,.98);
                border-radius:var(--simaksi-radius-sm);
                margin-top:.75rem;
                padding:.5rem;
            }
            .app-navbar-nav{flex-direction:column; align-items:stretch !important; gap:.15rem;}
            .app-navbar-nav .nav-link{padding:.65rem .9rem;}
            .search-container{width:100%; margin-bottom:.5rem;}
        }

    </style>

    @stack('styles')
</head>
<body>

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar app-navbar">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">

                <a href="{{ url('/') }}" class="navbar-brand text-white text-decoration-none d-flex align-items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="simaksi-logo">
                    <span>SIMAKSI.COM</span>
                </a>

                <button class="navbar-toggler-simaksi d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#appNavbarCollapse" aria-controls="appNavbarCollapse" aria-expanded="false" aria-label="Buka menu">
                    <i class="fas fa-bars"></i>
                </button>

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

                <div class="d-none d-lg-flex align-items-center gap-2">
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

                <!-- ============ MOBILE COLLAPSE PANEL ============ -->
                <div class="collapse app-navbar-collapse w-100 d-lg-none" id="appNavbarCollapse">
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

                    <form action="{{ route('gunung.search') }}" method="GET" class="mt-2">
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="q" value="{{ request()->get('q') ?? '' }}" placeholder="Cari Gunung..." class="navbar-search-input" autocomplete="off">
                            <button type="submit" class="btn-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="mt-2">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger fw-bold w-100"> <i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-simaksi-primary text-white w-100"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                        @endauth
                    </div>
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
