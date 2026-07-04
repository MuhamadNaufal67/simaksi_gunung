@extends('layouts.main')

@section('title', 'Rute Pendakian - SIMAKSI')

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

    .btn-daftar {
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

    .btn-daftar:hover {
        background: linear-gradient(135deg, #20c997, #1e7e34);
        transform: translateY(-2px);
        color: #fff;
    }
</style>

<div class="rute-container">
    <h1>🥾 Rute Pendakian {{ $gunung->nama_gunung }}</h1>
    <p class="subtext">
        Pilih jalur resmi pendakian di Gunung {{ $gunung->nama_gunung }} untuk keamanan dan kenyamanan pendakianmu.
    </p>

    @if($gunung->latitude && $gunung->longitude)
        <div class="map-section" style="margin: 40px 0; text-align: center;">
            <h2 style="color: #104734; margin-bottom: 20px;">📍 Lokasi Gunung {{ $gunung->nama_gunung }} di Peta</h2>
            <div id="map" style="width:100%; max-width: 800px; height:400px; border:1px solid #ddd; border-radius:10px; margin: 0 auto;"></div>
        </div>
    @endif

    <div class="rute-grid">
        @forelse($rutes as $r)
        <div class="rute-card">
            <img src="{{ asset('images/rute/default.jpg') }}" alt="{{ $r->nama_rute }}">
            <div class="rute-info">
                <span class="rute-badge">{{ $gunung->nama_gunung }}</span>
                <h3>{{ $r->nama_rute }}</h3>
                <p><strong>Harga:</strong> Rp {{ number_format($r->harga, 0, ',', '.') }}</p>
                <p><strong>Deskripsi:</strong> {{ $r->deskripsi ?? 'Tidak ada deskripsi.' }}</p>

                <a href="{{ route('pendaftaran.create.with.params', ['gunung_id' => $gunung->id_gunung, 'rute_id' => $r->id_rute]) }}" class="btn-daftar">📝 Daftar SIMAKSI</a>
            </div>
        </div>
        @empty
        <p>Tidak ada data rute pendakian untuk gunung ini.</p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
    @if($gunung->latitude && $gunung->longitude)
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap" async defer></script>
        <script>
            function initMap(){
                var lat = parseFloat('{{ $gunung->latitude }}');
                var lng = parseFloat('{{ $gunung->longitude }}');
                var center = { lat: lat, lng: lng };
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: center,
                    zoom: 12
                });
                new google.maps.Marker({ position: center, map: map, title: '{{ $gunung->nama_gunung }}' });
            }
        </script>
    @endif
@endpush
