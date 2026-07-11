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
            /* ===== Design System tokens (shared with admin panel) ===== */
            --simaksi-primary:#15803d;
            --simaksi-primary-2:#15803d;
            --simaksi-primary-hover:#166534;
            --simaksi-accent:#166534;
            --simaksi-primary-soft:rgba(21,128,61,.12);
            --simaksi-bg:#f5faf7;
            --simaksi-text:#0f172a;
            --simaksi-muted:#64748b;
            --simaksi-card:#ffffff;
            --simaksi-border:#dfe9e3;
            --simaksi-radius:20px;
            --simaksi-radius-sm:14px;
            --simaksi-shadow:0 8px 30px rgba(15,23,42,.05);
            --simaksi-shadow-md:0 14px 40px rgba(15,23,42,.09);
        }

        *{box-sizing:border-box;}

        body{
            background:
                radial-gradient(circle at top left, rgba(21,128,61,.05), transparent 26%),
                linear-gradient(180deg, #f8fcf9 0%, #f4faf6 48%, #f8fafc 100%);
            font-family:'Plus Jakarta Sans','Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color:var(--simaksi-text);
        }

        h1,h2,h3,h4,h5,h6{font-weight:700; letter-spacing:-.01em;}

        /* ============================================================
           GLOBAL COMPONENT SYSTEM (mirrors admin panel — applies to
           every public & user page that extends this layout)
        ============================================================ */
        .card{ border:1px solid var(--simaksi-border); border-radius:var(--simaksi-radius); box-shadow:var(--simaksi-shadow); }
        .card-header{ background:transparent; border-bottom:1px solid var(--simaksi-border); font-weight:700; padding:1rem 1.25rem; }
        .card-body{ padding:1.25rem; }

        .btn{ border-radius:999px; font-weight:700; font-size:.9rem; padding:.65rem 1.15rem; transition:transform .12s ease, box-shadow .12s ease, filter .12s ease; }
        .btn:hover{ transform:translateY(-1px); }
        .btn-sm{ border-radius:999px; padding:.4rem .8rem; font-size:.82rem; }
        .btn-primary{ background:var(--simaksi-primary); border-color:var(--simaksi-primary); }
        .btn-primary:hover{ background:var(--simaksi-primary-hover); border-color:var(--simaksi-primary-hover); }
        .btn-success{ background:var(--simaksi-primary); border-color:var(--simaksi-primary); }
        .btn-success:hover{ background:var(--simaksi-primary-hover); border-color:var(--simaksi-primary-hover); }
        .btn-outline-primary{ color:var(--simaksi-primary); border-color:var(--simaksi-primary); }
        .btn-outline-primary:hover{ background:var(--simaksi-primary); border-color:var(--simaksi-primary); color:#fff; }

        .form-label{ font-weight:600; font-size:.85rem; color:var(--simaksi-text); margin-bottom:.4rem; }
        .form-control, .form-select{ border-radius:var(--simaksi-radius-sm); border:1px solid var(--simaksi-border); padding:.6rem .85rem; font-size:.9rem; min-height:44px; }
        .form-control:focus, .form-select:focus{ border-color:var(--simaksi-primary); box-shadow:0 0 0 3px var(--simaksi-primary-soft); }
        .form-control.is-invalid, .form-select.is-invalid{ border-color:#dc3545; box-shadow:0 0 0 3px rgba(220,53,69,.12); }
        .invalid-feedback.dynamic-feedback{ display:block; font-size:.82rem; margin-top:.35rem; }
        textarea.form-control{ min-height:auto; }

        .alert{ border:1px solid transparent; border-radius:var(--simaksi-radius-sm); font-size:.9rem; padding:.85rem 1.1rem; }
        .alert-success{ background:#ecfdf3; color:#166534; border-color:#bbf0cf; }
        .alert-danger{ background:#fef2f2; color:#b91c1c; border-color:#fecaca; }
        .alert-warning{ background:#fffbeb; color:#92400e; border-color:#fde68a; }
        .alert-info{ background:#f0f9ff; color:#075985; border-color:#bae6fd; }

        .table{ margin-bottom:0; font-size:.9rem; }
        .table thead th{ background:#fafbfa; color:var(--simaksi-muted); font-size:.74rem; font-weight:700; text-transform:uppercase; letter-spacing:.04em; border-bottom:1px solid var(--simaksi-border); padding:.9rem 1.1rem; white-space:nowrap; }
        .table tbody td{ padding:.9rem 1.1rem; vertical-align:middle; border-bottom:1px solid var(--simaksi-border); color:var(--simaksi-text); }
        .table-striped tbody tr:nth-of-type(odd) td{ background:#fafcfb; }
        .table-hover tbody tr:hover td{ background:var(--simaksi-primary-soft); }

        .badge{ font-weight:700; border-radius:999px; padding:.5em .9em; font-size:.72rem; letter-spacing:.02em; }
        .badge-primary{ background:var(--simaksi-primary-soft); color:var(--simaksi-primary); }
        .badge-success{ background:#dcfce7; color:#15803d; }
        .badge-danger{ background:#fee2e2; color:#b91c1c; }
        .badge-warning{ background:#fef3c7; color:#92400e; }
        .badge-info{ background:#e0f2fe; color:#075985; }

        .page-heading{ margin-bottom:1.5rem; }
        .page-heading h1{ font-size:1.5rem; margin-bottom:.2rem; }
        .page-heading p{ color:var(--simaksi-muted); font-size:.92rem; margin-bottom:0; }

        .breadcrumb-simaksi{ font-size:.82rem; color:var(--simaksi-muted); margin-bottom:.75rem; }
        .breadcrumb-simaksi a{ color:var(--simaksi-muted); text-decoration:none; }
        .breadcrumb-simaksi a:hover{ color:var(--simaksi-primary); }

        .pagination{ gap:.25rem; }
        .page-link{ border-radius:var(--simaksi-radius-sm); border:1px solid var(--simaksi-border); color:var(--simaksi-text); font-weight:600; font-size:.85rem; }
        .page-item.active .page-link{ background:var(--simaksi-primary); border-color:var(--simaksi-primary); }
        .page-link:hover{ background:var(--simaksi-primary-soft); color:var(--simaksi-primary); }

        /* ================= NAVBAR ================= */
        .app-navbar{
            background:linear-gradient(100deg,#0f4c33 0%, #0a3322 55%, #0b3d29 100%);
            border-bottom:1px solid rgba(255,255,255,.08);
            box-shadow:0 8px 22px rgba(6,30,20,.20);
            position:sticky;
            top:0;
            z-index:1030;
            min-height:82px;
            padding:.75rem 0;
        }
        .app-navbar .container{max-width:1320px; padding-left:1rem; padding-right:1rem;}
        .app-navbar .navbar-brand{font-weight:800; letter-spacing:.2px; font-size:1.15rem; color:#ffffff; flex-shrink:0; min-width:max-content;}
        .navbar-shell{display:flex; align-items:center; justify-content:space-between; gap:1.1rem; width:100%; flex-wrap:nowrap;}
        .navbar-brand-wrap{display:flex; align-items:center; min-width:max-content; flex-shrink:0;}
        .navbar-menu-wrap{flex:1 1 auto; display:flex; justify-content:center; min-width:0;}
        .navbar-actions-wrap{display:flex; align-items:center; justify-content:flex-end; gap:.85rem; flex-shrink:0; min-width:max-content;}
        .app-navbar-nav{display:flex; align-items:center; justify-content:center; gap:.2rem; flex-wrap:nowrap;}
        .app-navbar-nav .nav-link{
            color:rgba(255,255,255,.88);
            padding:.5rem .8rem;
            border-radius:999px;
            font-weight:600;
            font-size:.9rem;
            transition:background .18s ease,color .18s ease, transform .18s ease;
            white-space:nowrap;
        }
        .app-navbar-nav .nav-link:hover{color:#ffffff; background:rgba(255,255,255,.10); transform:translateY(-1px);}
        .app-navbar-nav .nav-link.active{background:rgba(34,197,94,.22); color:#ffffff; box-shadow:inset 0 0 0 1px rgba(255,255,255,.08);}

        .navbar-toggler-simaksi{
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.18);
            border-radius:12px;
            color:#ffffff;
            padding:.45rem .7rem;
            box-shadow:none;
        }
        .navbar-toggler-simaksi:hover{background:rgba(255,255,255,.14);}

        .btn-simaksi-primary{background:linear-gradient(135deg,var(--simaksi-primary-2),var(--simaksi-accent)); border:0; font-weight:700; border-radius:999px; box-shadow:0 8px 20px rgba(21,128,61,.20); padding:.65rem 1rem;}
        .btn-simaksi-primary:hover{filter:brightness(.96); color:#fff;}
        .btn-simaksi-soft{background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.18); color:#ffffff; font-weight:700; box-shadow:none; padding:.65rem .95rem;}
        .btn-simaksi-soft:hover{border-color:rgba(255,255,255,.3); color:#ffffff; background:rgba(255,255,255,.14);}
        .btn-simaksi-danger{background:rgba(255,255,255,.06); border:1px solid rgba(248,113,113,.55); color:#fecaca; font-weight:700; padding:.62rem .95rem;}
        .btn-simaksi-danger:hover{background:rgba(127,29,29,.28); color:#ffffff; border-color:rgba(252,165,165,.72);}

        main{padding:36px 0 56px 0;}
        .app-content{max-width:1200px;margin:0 auto; padding:0 1rem;}

        footer{background:#0f2f22; color:#e8f5e9; text-align:center; padding:22px 0; font-size:.92rem;}
        footer a{color:#b9f6c1;}

        .card-simaksi{background:var(--simaksi-card); border:1px solid var(--simaksi-border); border-radius:var(--simaksi-radius); box-shadow:var(--simaksi-shadow); transition:transform .18s ease, box-shadow .18s ease;}
        .card-simaksi:hover{transform:translateY(-2px); box-shadow:var(--simaksi-shadow-md);}

        /* Search */
        .search-container{position:relative;display:flex;align-items:center;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.16);border-radius:999px;padding:4px 4px 4px 40px;width:250px;max-width:260px;backdrop-filter:blur(6px);}
        .search-container:focus-within{border-color:rgba(167,243,208,.5); box-shadow:0 0 0 4px rgba(110,231,183,.12);}
        .search-icon{position:absolute;left:14px;color:rgba(255,255,255,.72);font-size:.85rem;pointer-events:none;}
        .navbar-search-input{background:transparent;border:none;color:#ffffff;padding:8px 44px 8px 0;border-radius:24px;font-size:.88rem;flex:1;outline:none;min-width:0;}
        .navbar-search-input::placeholder{color:rgba(255,255,255,.66);}
        .btn-clear-search{position:absolute;right:50px;background:transparent;border:none;color:rgba(255,255,255,.72);cursor:pointer;padding:6px;border-radius:50%;display:none;}
        .btn-clear-search:hover{background:rgba(255,255,255,.12);}
        .btn-search{background:linear-gradient(135deg,#22c55e,#16a34a);color:#fff;border:none;padding:8px 12px;border-radius:999px;font-weight:700;cursor:pointer;transition:transform .15s ease,box-shadow .2s;box-shadow:0 8px 18px rgba(22,163,74,.22);display:inline-flex;align-items:center;gap:6px;min-width:42px;justify-content:center;}
        .btn-search:hover{filter:brightness(.95);transform:translateY(-1px);}

        .badge-simaksi{border-radius:999px; font-weight:700;}
        .simaksi-logo{height:38px; width:auto; border-radius:10px;}
        .navbar-user-pill{
            display:inline-flex; align-items:center; gap:.55rem; padding:.3rem .68rem .3rem .36rem;
            border-radius:999px; background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.16); box-shadow:none;
            max-width:180px;
        }
        .navbar-user-avatar{
            width:32px; height:32px; border-radius:50%; display:flex; align-items:center; justify-content:center;
            background:rgba(167,243,208,.18); color:#d1fae5; font-weight:800; font-size:.8rem; flex-shrink:0;
        }
        .navbar-user-meta{line-height:1.1; min-width:0;}
        .navbar-user-name{font-size:.8rem; font-weight:700; color:#ffffff; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; max-width:110px;}
        .navbar-user-role{font-size:.72rem; color:rgba(255,255,255,.68);}
        .navbar-auth-actions{display:flex; align-items:center; gap:.6rem; flex-wrap:nowrap;}
        .navbar-search-form{margin:0;}

        /* Mobile collapse panel */
        @media (max-width: 991.98px){
            .navbar-shell{flex-wrap:wrap; gap:.75rem;}
            .navbar-brand-wrap{flex:1 1 auto; min-width:0;}
            .app-navbar-collapse{
                background:linear-gradient(180deg, rgba(10,51,34,.98), rgba(8,38,26,.98));
                border:1px solid rgba(255,255,255,.08);
                box-shadow:0 18px 36px rgba(6,30,20,.28);
                border-radius:var(--simaksi-radius);
                margin-top:.75rem;
                padding:.8rem;
            }
            .app-navbar-nav{flex-direction:column; align-items:stretch !important; gap:.15rem;}
            .app-navbar-nav .nav-link{padding:.65rem .9rem;}
            .search-container{width:100%; margin-bottom:.5rem;}
            .navbar-auth-actions{flex-direction:column; width:100%;}
            .navbar-auth-actions .btn, .navbar-auth-actions form{width:100%;}
            .navbar-user-meta{display:block;}
        }
        @media (min-width: 992px){
            .app-navbar-collapse{display:none !important;}
        }

    </style>

    @stack('styles')
</head>
<body>

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar app-navbar">
        <div class="container">
            <div class="navbar-shell">
                <div class="navbar-brand-wrap">
                    <a href="{{ url('/') }}" class="navbar-brand text-white text-decoration-none d-flex align-items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="simaksi-logo">
                        <span>SIMAKSI.COM</span>
                    </a>
                </div>

                <div class="navbar-menu-wrap d-none d-lg-flex">
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
                        @auth
                            <li class="nav-item"><a href="{{ route('pendaftaran.index') }}" class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}">Isi Formulir SIMAKSI</a></li>
                        @endauth
                    </ul>
                </div>

                <div class="navbar-actions-wrap d-none d-lg-flex">
                    <form action="{{ route('gunung.search') }}" method="GET" class="navbar-search-form" data-search-form>
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input id="navbarSearchInput" type="text" name="q" value="{{ request()->get('q') ?? '' }}" placeholder="Cari gunung..." class="navbar-search-input" autocomplete="off" data-search-input maxlength="100">
                            <button id="navbarSearchClear" type="button" class="btn-clear-search" aria-label="Hapus">
                                <i class="fas fa-times"></i>
                            </button>
                            <button type="submit" class="btn-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    @auth
                        <div class="navbar-auth-actions">
                            <div class="navbar-user-pill">
                                <div class="navbar-user-avatar">{{ strtoupper(substr(Auth::user()->nama_lengkap ?? Auth::user()->name ?? 'U', 0, 1)) }}</div>
                                <div class="navbar-user-meta">
                                    <div class="navbar-user-name">{{ Auth::user()->nama_lengkap ?? Auth::user()->name }}</div>
                                    <div class="navbar-user-role">Pendaki</div>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="m-0" data-confirm-message="Yakin ingin logout dari akun ini?" data-confirm-title="Konfirmasi Logout" data-confirm-ok="Ya, logout">
                                @csrf
                                <button type="submit" class="btn btn-simaksi-danger fw-bold"><i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                            </form>
                        </div>
                    @else
                        <div class="navbar-auth-actions">
                            <a href="{{ route('login') }}" class="btn btn-simaksi-soft"><i class="fas fa-sign-in-alt me-1"></i> Masuk</a>
                            <a href="{{ route('register') }}" class="btn btn-simaksi-primary text-white"><i class="fas fa-user-plus me-1"></i> Daftar</a>
                        </div>
                    @endauth
                </div>

                <button class="navbar-toggler-simaksi d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#appNavbarCollapse" aria-controls="appNavbarCollapse" aria-expanded="false" aria-label="Buka menu">
                    <i class="fas fa-bars"></i>
                </button>

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
                        @auth
                            <li class="nav-item"><a href="{{ route('pendaftaran.index') }}" class="nav-link {{ request()->is('pendaftaran*') ? 'active' : '' }}">Isi Formulir SIMAKSI</a></li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Isi Formulir SIMAKSI</a></li>
                        @endauth
                    </ul>

                    <form action="{{ route('gunung.search') }}" method="GET" class="mt-2" data-search-form>
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="q" value="{{ request()->get('q') ?? '' }}" placeholder="Cari gunung..." class="navbar-search-input" autocomplete="off" data-search-input maxlength="100">
                            <button type="submit" class="btn-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="mt-2 navbar-auth-actions">
                        @auth
                            <div class="navbar-user-pill w-100 justify-content-start">
                                <div class="navbar-user-avatar">{{ strtoupper(substr(Auth::user()->nama_lengkap ?? Auth::user()->name ?? 'U', 0, 1)) }}</div>
                                <div class="navbar-user-meta">
                                    <div class="navbar-user-name">{{ Auth::user()->nama_lengkap ?? Auth::user()->name }}</div>
                                    <div class="navbar-user-role">Pendaki</div>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="m-0" data-confirm-message="Yakin ingin logout dari akun ini?" data-confirm-title="Konfirmasi Logout" data-confirm-ok="Ya, logout">
                                @csrf
                                <button type="submit" class="btn btn-simaksi-danger fw-bold w-100"> <i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-simaksi-soft w-100"><i class="fas fa-sign-in-alt me-1"></i> Masuk</a>
                            <a href="{{ route('register') }}" class="btn btn-simaksi-primary text-white w-100"><i class="fas fa-user-plus me-1"></i> Daftar</a>
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
        (function () {
            function normalizeSpaces(value) {
                return String(value || '').replace(/\s+/g, ' ').trim();
            }

            function setInvalid(el, message) {
                if (!el) return;
                el.classList.add('is-invalid');
                el.setAttribute('aria-invalid', 'true');
                el.setCustomValidity(message || 'Input tidak valid');

                let feedback = el.parentElement ? el.parentElement.querySelector(`.dynamic-feedback[data-for="${el.name || el.id || ''}"]`) : null;
                if (!feedback) {
                    feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback dynamic-feedback';
                    feedback.dataset.for = el.name || el.id || '';
                    el.insertAdjacentElement('afterend', feedback);
                }
                feedback.textContent = message || 'Input tidak valid';
            }

            function clearInvalid(el) {
                if (!el) return;
                el.classList.remove('is-invalid');
                el.removeAttribute('aria-invalid');
                el.setCustomValidity('');
                const feedback = el.parentElement ? el.parentElement.querySelector(`.dynamic-feedback[data-for="${el.name || el.id || ''}"]`) : null;
                if (feedback) feedback.remove();
            }

            function validateName(el) {
                const raw = String(el.value || '');
                const cleaned = raw.replace(/[^A-Za-z\s'.-]/g, '').replace(/\s{2,}/g, ' ');
                if (cleaned !== raw) el.value = cleaned;
                const value = normalizeSpaces(el.value);
                el.value = value;

                if (!value) return setInvalid(el, 'Nama wajib diisi.'), false;
                if (value.length < 3) return setInvalid(el, 'Nama minimal 3 karakter.'), false;
                if (/^\d+$/.test(value)) return setInvalid(el, 'Nama tidak boleh hanya angka.'), false;
                if (!/[A-Za-z]/.test(value)) return setInvalid(el, 'Nama harus mengandung huruf.'), false;
                clearInvalid(el);
                return true;
            }

            function validatePhone(el) {
                const digits = String(el.value || '').replace(/\D/g, '').slice(0, 15);
                el.value = digits;
                if (!digits) return setInvalid(el, 'Nomor HP wajib diisi.'), false;
                if (digits.length < 10 || digits.length > 15) return setInvalid(el, 'Nomor HP harus 10-15 digit angka.'), false;
                clearInvalid(el);
                return true;
            }

            function validateAge(el) {
                const digits = String(el.value || '').replace(/\D/g, '');
                el.value = digits;
                const value = parseInt(digits || '0', 10);
                if (!digits) return setInvalid(el, 'Usia wajib diisi.'), false;
                if (value < 1 || value > 100) return setInvalid(el, 'Usia harus antara 1 sampai 100 tahun.'), false;
                clearInvalid(el);
                return true;
            }

            function validatePositiveInt(el, min = 1, allowZero = false) {
                const digits = String(el.value || '').replace(/\D/g, '');
                el.value = digits;
                if (!digits && !allowZero) return setInvalid(el, 'Field ini wajib diisi.'), false;
                if (!digits && allowZero) return clearInvalid(el), true;
                const value = parseInt(digits, 10);
                if (!allowZero && value < min) return setInvalid(el, `Nilai minimal ${min}.`), false;
                if (allowZero && value < 0) return setInvalid(el, 'Nilai tidak boleh negatif.'), false;
                clearInvalid(el);
                return true;
            }

            function validateEmail(el) {
                const value = String(el.value || '').replace(/\s+/g, '');
                el.value = value;
                if (!value) return setInvalid(el, 'Email wajib diisi.'), false;
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) return setInvalid(el, 'Format email tidak valid.'), false;
                clearInvalid(el);
                return true;
            }

            function validateIdentity(el) {
                const selector = el.dataset.identityTypeTarget;
                const typeEl = selector ? document.querySelector(selector) : null;
                const identityType = (typeEl ? typeEl.value : '').toUpperCase();
                const raw = String(el.value || '').toUpperCase().replace(/\s+/g, '');
                const cleaned = identityType === 'KTP' || identityType === 'KK'
                    ? raw.replace(/\D/g, '').slice(0, 16)
                    : raw.replace(/[^A-Z0-9]/g, '').slice(0, 20);
                el.value = cleaned;

                if (!cleaned) return setInvalid(el, 'Nomor identitas wajib diisi.'), false;
                if (identityType === 'KTP' || identityType === 'KK') {
                    if (!/^\d{16}$/.test(cleaned)) return setInvalid(el, `Nomor identitas untuk ${identityType} wajib tepat 16 digit angka.`), false;
                } else if (identityType === 'SIM') {
                    if (!/^[A-Z0-9]{5,20}$/.test(cleaned)) return setInvalid(el, 'Nomor SIM hanya boleh huruf/angka dengan panjang 5-20 karakter.'), false;
                } else if (!/^[A-Z0-9]{4,20}$/.test(cleaned)) {
                    return setInvalid(el, 'Nomor identitas hanya boleh huruf/angka dengan panjang wajar.'), false;
                }

                clearInvalid(el);
                return true;
            }

            function validateFile(el) {
                if (!el.files || !el.files.length) {
                    clearInvalid(el);
                    return true;
                }
                const allowed = (el.dataset.allowedExt || '').split(',').map(v => v.trim().toLowerCase()).filter(Boolean);
                if (!allowed.length) {
                    clearInvalid(el);
                    return true;
                }
                const fileName = el.files[0].name.toLowerCase();
                const ext = fileName.includes('.') ? fileName.split('.').pop() : '';
                if (!allowed.includes(ext)) return setInvalid(el, `File harus berformat: ${allowed.join(', ')}.`), false;
                clearInvalid(el);
                return true;
            }

            function sanitizeSearchValue(value) {
                return normalizeSpaces(String(value || '').replace(/[<>{}[\]^`;$\\|]/g, ''));
            }

            function validateField(el) {
                const type = el.dataset.validate;
                if (!type) return true;
                if (type === 'name') return validateName(el);
                if (type === 'phone') return validatePhone(el);
                if (type === 'age') return validateAge(el);
                if (type === 'email') return validateEmail(el);
                if (type === 'identity') return validateIdentity(el);
                if (type === 'quantity') return validatePositiveInt(el, 1, false);
                if (type === 'price') return validatePositiveInt(el, 0, true);
                if (type === 'file') return validateFile(el);
                return true;
            }

            document.addEventListener('input', function (e) {
                const el = e.target;
                if (!(el instanceof HTMLInputElement || el instanceof HTMLTextAreaElement || el instanceof HTMLSelectElement)) return;
                if (el.dataset.validate) validateField(el);
            });

            document.addEventListener('change', function (e) {
                const el = e.target;
                if (!(el instanceof HTMLInputElement || el instanceof HTMLTextAreaElement || el instanceof HTMLSelectElement)) return;
                if (el.dataset.validate) validateField(el);
                if (el.matches('[data-identity-type-source]')) {
                    const target = document.querySelector(el.dataset.identityTypeSource);
                    if (target) validateIdentity(target);
                }
            });

            document.addEventListener('input', function (e) {
                const el = e.target;
                if (!(el instanceof HTMLInputElement)) return;
                if (el.type === 'search' || el.hasAttribute('data-search-input')) {
                    el.value = sanitizeSearchValue(el.value);
                }
            });

            document.addEventListener('submit', function (e) {
                const form = e.target;
                if (!(form instanceof HTMLFormElement)) return;

                const searchInput = form.querySelector('[data-search-input]');
                if (searchInput) {
                    searchInput.value = sanitizeSearchValue(searchInput.value);
                    if (!searchInput.value) {
                        e.preventDefault();
                        Swal.fire({ icon: 'info', title: 'Masukkan kata kunci pencarian terlebih dahulu.', confirmButtonColor: '#28a745' });
                        return;
                    }
                }

                let invalid = false;
                form.querySelectorAll('[data-validate]').forEach((field) => {
                    if (!validateField(field) && !invalid) {
                        invalid = true;
                        field.focus();
                    }
                });
                if (invalid) {
                    e.preventDefault();
                    Swal.fire({ icon: 'warning', title: 'Periksa kembali input yang masih tidak valid.', confirmButtonColor: '#28a745' });
                    return;
                }

                if (form.dataset.confirmed === 'true') {
                    delete form.dataset.confirmed;
                    return;
                }

                const confirmMessage = form.dataset.confirmMessage;
                if (confirmMessage) {
                    e.preventDefault();
                    Swal.fire({
                        icon: form.dataset.confirmIcon || 'question',
                        title: form.dataset.confirmTitle || 'Konfirmasi',
                        text: confirmMessage,
                        showCancelButton: true,
                        confirmButtonText: form.dataset.confirmOk || 'Ya, lanjutkan',
                        cancelButtonText: form.dataset.confirmCancel || 'Batal',
                        confirmButtonColor: '#28a745'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.dataset.confirmed = 'true';
                            form.requestSubmit ? form.requestSubmit() : form.submit();
                        }
                    });
                }
            }, true);
        })();
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
