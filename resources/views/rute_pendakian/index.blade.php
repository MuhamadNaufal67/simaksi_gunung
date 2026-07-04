@extends('layouts.main')

@section('title', 'Rute Pendakian Resmi - SIMAKSI')

@section('content')
<style>
    .rute-container {
        max-width: 1200px;
        margin: auto;
        text-align: center;
    }

    h1 {
        color: #104734;
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    p.subtext {
        color: #4a7c59;
        margin-bottom: 40px;
    }

    .rute-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .rute-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: 0.3s;
        text-align: left;
    }

    .rute-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(16,71,52,0.2);
    }

    .rute-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .rute-info {
        padding: 20px;
    }

    .rute-info h3 {
        color: #104734;
        margin-bottom: 10px;
    }

    .rute-info p {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 8px;
    }

    .rute-badge {
        background: #28a745;
        color: white;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 50px;
        display: inline-block;
        margin-bottom: 10px;
    }
</style>

<div class="rute-container">
    <h1>🥾 Rute Pendakian Resmi</h1>
    <p class="subtext">Gunakan jalur pendakian resmi untuk keamanan dan kelestarian alam. Berikut beberapa rute pendakian resmi dari berbagai gunung di Indonesia.</p>

    <div class="rute-grid">
        @forelse($rutes as $r)
        <div class="rute-card">
            {{-- Jika kamu ingin tampilkan gambar, nanti bisa tambah kolom "gambar" di database --}}
            <img src="{{ asset('images/rute/default.jpg') }}" alt="{{ $r->nama_rute }}">
            <div class="rute-info">
                <span class="rute-badge">{{ $r->gunung->nama_gunung ?? 'Gunung Tidak Diketahui' }}</span>
                <h3>{{ $r->nama_rute }}</h3>
                <p><strong>Harga:</strong> Rp {{ number_format($r->harga, 0, ',', '.') }}</p>
                <p><strong>Deskripsi:</strong> {{ $r->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>
        @empty
        <p>Tidak ada data rute pendakian tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
