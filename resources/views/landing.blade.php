<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Simaksi Gunung</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background: #ffffff;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            background: rgba(16, 71, 52, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
        }

        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px;
            display: flex;
            justify-content: space-between;
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

        .btn-login {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1e7e34, #198754);
            color: white;
        }

        /* ================= HERO SECTION ================= */
        .hero {
            background: linear-gradient(135deg, rgba(16, 71, 52, 0.85), rgba(34, 139, 34, 0.75)), 
                        url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 3.5rem;
            background: linear-gradient(135deg, #ffffff, #e8f5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            text-shadow: 0 2px 20px rgba(255, 255, 255, 0.8), 0 4px 40px rgba(255, 255, 255, 0.4);
            font-weight: 800;
        }

        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #ffffff;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .btn-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 14px 30px;
            border-radius: 40px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }

        .btn:hover {
            background: linear-gradient(135deg, #218838, #198754);
            transform: translateY(-2px);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .feature-item {
            text-align: center;
            color: #e8f5e9;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .feature-text {
            font-size: 1rem;
            font-weight: 600;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .nav-list {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .subtitle {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                SIMAKSI.COM
            </a>
            <ul class="nav-list">
                <li><a href="{{ route('landing') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('gunung.index') }}" class="nav-link {{ request()->is('gunung') ? 'active' : '' }}">Gunung</a></li>
                <li><a href="{{ route('rute_pendakian.index') }}" class="nav-link {{ request()->is('rute') ? 'active' : '' }}">Rute</a></li>
                <li><a href="{{ route('panduan') }}" class="nav-link {{ request()->is('panduan') ? 'active' : '' }}">Panduan</a></li>
                <li><a href="{{ route('tentang') }}" class="nav-link {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- ================= HERO SECTION ================= -->
    <section class="hero">
        <h1>Selamat Datang di SIMAKSI.COM</h1>
        <p class="subtitle">
            Kelola pendakian Anda dengan mudah dan aman.<br>
            Jelajahi keindahan alam Indonesia bersama kami.
        </p>

        <div class="btn-container">
            <a href="{{ route('register') }}" class="btn">📝 Daftar Sekarang</a>
        </div>

        <div class="features">
            <div class="feature-item">
                <div class="feature-icon">✅</div>
                <div class="feature-text">Pendaftaran Mudah</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🔒</div>
                <div class="feature-text">Aman & Terpercaya</div>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🗺️</div>
                <div class="feature-text">Panduan Lengkap</div>
            </div>
        </div>
    </section>

</body>
</html>
