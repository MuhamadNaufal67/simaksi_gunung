@extends('layouts.main')

@section('title', 'Daftar Gunung')

@section('content')
<style>
    .gunung-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .gunung-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .gunung-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #155c3b;
    }

    .gunung-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .gunung-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gunung-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .gunung-img {
        height: 180px;
        width: 100%;
        object-fit: cover;
    }

    .gunung-body {
        padding: 20px;
    }

    .gunung-body h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #104734;
        margin-bottom: 8px;
    }

    .gunung-body p {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 10px;
    }

    .gunung-info {
        font-size: 0.9rem;
        color: #333;
        margin-bottom: 10px;
    }

    .badge {
        background-color: #28a745;
        color: white;
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 0.85rem;
    }

    .btn-detail {
        display: inline-block;
        background: linear-gradient(135deg, #1e7e34, #20c997);
        color: white;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .btn-detail:hover {
        background: linear-gradient(135deg, #20c997, #1e7e34);
        color: #fff;
        transform: translateY(-2px);
    }

</style>

<div class="gunung-container">
    <div class="gunung-header">
        <h1>🌄 Daftar Gunung di Indonesia</h1>
        <p>Temukan informasi lengkap tentang gunung dan rute pendakian di Indonesia.</p>
    </div>

    @if(isset($query))
    <div class="container mt-3 mb-2">
        <p><strong>Hasil pencarian untuk:</strong> "{{ $query }}" — <small>{{ $gunungs->count() }} hasil</small></p>
    </div>
    @endif

    @if($gunungs->isEmpty())
        <p class="text-center text-muted">Belum ada data gunung.</p>
    @else
        <div class="gunung-grid">
            @foreach($gunungs as $gunung)
                <div class="gunung-card">
                    {{-- Gambar gunung --}}
                    <img src="{{ asset('images/gunung/' . ($gunung->gambar ?? 'default.jpg')) }}" 
                         class="gunung-img" 
                         alt="{{ $gunung->nama_gunung }}">

                    <div class="gunung-body">
                        <h3>{{ $gunung->nama_gunung }}</h3>
                        <p>{{ Str::limit($gunung->deskripsi, 120) }}</p>

                        <div class="gunung-info">
                            📍 <strong>{{ $gunung->lokasi }}</strong><br>
                            💰 <span class="badge">Rp {{ number_format($gunung->harga_simaksi, 0, ',', '.') }}</span>
                        </div>

                        {{-- 🔹 Arahkan ke rute khusus gunung ini --}}
                        <a href="{{ route('rute.by-gunung', $gunung->id_gunung) }}" class="btn-detail">Lihat Rute</a>
                        @if($gunung->latitude && $gunung->longitude)
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $gunung->latitude }},{{ $gunung->longitude }}" target="_blank" class="btn-detail" style="background: linear-gradient(135deg, #4285f4, #34a853); margin-left: 10px;">📍 Lihat di Maps</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
