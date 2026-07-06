<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - SIMAKSI Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root{
            --simaksi-primary:#2E7D32;
            --simaksi-primary-hover:#1B5E20;
            --simaksi-secondary:#43A047;
            --simaksi-bg:#F8FAFC;
            --simaksi-card:#FFFFFF;
            --simaksi-border:#E5E7EB;
            --simaksi-text:#1F2937;
            --simaksi-muted:#6B7280;
            --simaksi-danger:#DC2626;
            --simaksi-warning:#F59E0B;
            --simaksi-success:#16A34A;
            --simaksi-radius-card:16px;
            --simaksi-radius-btn:12px;
            --simaksi-radius-input:10px;
            --simaksi-shadow:0 10px 30px rgba(0,0,0,.04);
        }

        body{background:var(--simaksi-bg); color:var(--simaksi-text); font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;}
        .card-simaksi{background:var(--simaksi-card); border:1px solid var(--simaksi-border); border-radius:var(--simaksi-radius-card); box-shadow:var(--simaksi-shadow);} 
        .btn-simaksi-primary{background:linear-gradient(135deg,var(--simaksi-secondary),#20c997); border:0; font-weight:800; border-radius:var(--simaksi-radius-btn);} 
        .btn-simaksi-primary:hover{filter:brightness(.97);}
        .btn-simaksi-secondary{background:rgba(67,160,71,.12); color:var(--simaksi-primary); border:1px solid rgba(67,160,71,.35); font-weight:800; border-radius:var(--simaksi-radius-btn);} 
        .btn-simaksi-secondary:hover{background:rgba(67,160,71,.18);}
        .badge-simaksi{border-radius:999px; font-weight:800;}

        /* Sidebar */
        .admin-sidebar{background:linear-gradient(180deg,#0b2f22,#0f3f2d); border-right:1px solid rgba(229,231,235,.15);}
        .admin-sidebar .brand{padding:14px 16px;}
        .admin-sidebar .nav{padding:10px 12px;}
        .admin-sidebar .nav-link{
            color:rgba(255,255,255,.88);
            padding:12px 12px;
            border-radius:12px;
            display:flex;
            align-items:center;
            gap:10px;
            font-weight:700;
            transition: background .2s ease, color .2s ease, transform .15s ease;
        }
        .admin-sidebar .nav-link:hover{background:rgba(255,255,255,.08); transform:translateY(-1px);} 
        .admin-sidebar .nav-link.active{background:rgba(67,160,71,.24); color:#fff;} 
        .admin-sidebar .nav-link i{width:18px; text-align:center;}

        /* Topbar */
        .admin-topbar{height:64px; background:rgba(255,255,255,.9) !important; border-bottom:1px solid var(--simaksi-border);} 
        .avatar-pill{background:rgba(67,160,71,.12); color:var(--simaksi-primary); font-weight:900; border:1px solid rgba(67,160,71,.25);} 

        /* Content wrapper */
        .admin-content-wrap{padding:24px;}

        /* Responsive sidebar collapse */
        @media (max-width: 991.98px){
            .admin-sidebar{position:fixed; z-index:1030; left:0; top:64px; height:calc(100vh - 64px); width:280px; transform:translateX(-105%); transition:transform .25s ease;}
            .admin-sidebar.show{transform:translateX(0);} 
            .admin-content-wrap{padding:16px;}
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 admin-sidebar collapse d-md-block" id="adminSidebar">
                <div class="brand text-center">
                    <div class="fw-bold text-white">SIMAKSI Admin</div>
                </div>
                <div class="position-sticky" style="top:0;">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.gunung.index') }}">
                                <i class="fas fa-mountain me-2"></i>
                                Manajemen Gunung
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rute-pendakian.index') }}">
                                <i class="fas fa-route me-2"></i>
                                Manajemen Rute
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pendaftaran.index') }}">
                                <i class="fas fa-clipboard-list me-2"></i>
                                Manajemen Pendaftaran
                            </a>
                        </li>
                        {{-- Menu Manajemen Pembayaran dihilangkan sesuai permintaan --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pembayaran.index') }}">
                                <i class="fas fa-credit-card me-2"></i>
                                Manajemen Pembayaran
                            </a>
                        </li> --}}
                        {{-- Menu Verifikasi Peminjaman dihilangkan sesuai permintaan --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.peminjaman.index') }}">
                                <i class="fas fa-tools me-2"></i>
                                Verifikasi Peminjaman
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <i class="fas fa-users me-2"></i>
                                Manajemen User
                            </a>
                        </li>
                        {{-- Menu Kembali ke User dihilangkan sesuai permintaan --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali ke User
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                    <button type="submit" class="btn btn-simaksi-secondary w-100 text-start">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 admin-content-wrap">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <span class="navbar-brand">SIMAKSI Admin Panel</span>
                        <span class="navbar-text">
                            Selamat datang, {{ Auth::user()->nama_lengkap }}
                        </span>
                    </div>
                </nav>

                <!-- Content -->
                <div class="py-3">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        window.notify = function(type, title, text, options = {}) {
            const base = { icon: type, title: title || '', text: text || '', confirmButtonColor: '#28a745' };
            return Swal.fire(Object.assign(base, options));
        };
        window.toast = function(type, title, timer = 2600) {
            return Swal.fire({ toast: true, position: 'top-end', icon: type, title: title, showConfirmButton: false, timer: timer, timerProgressBar: true });
        };
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
                } catch(e) { originalAlert(message); }
            };
        })();
    </script>
    
    <script>
        // Simple sidebar toggle
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapse');
        });
    </script>
    
    {{-- Allow pages to push scripts --}}
    @stack('scripts')
</body>
</html>
