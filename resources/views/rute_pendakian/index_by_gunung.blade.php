@extends('layouts.main')

@section('title', 'Rute Pendakian - SIMAKSI')

@section('content')
<section class="container py-4 py-md-5">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-2">🥾 Rute Pendakian {{ $gunung->nama_gunung }}</h1>
            <p class="text-muted mb-0">Pilih jalur resmi pendakian untuk keamanan dan kenyamanan.</p>
        </div>
    </div>

    @if($gunung->latitude && $gunung->longitude)
        <div class="card-simaksi p-4 mb-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="fa fa-map" style="color:#15803d;"></i>
                <h2 class="h5 fw-bold mb-0">📍 Lokasi Gunung {{ $gunung->nama_gunung }} di Peta</h2>
            </div>
            <div id="map" class="w-100" style="height:420px; border-radius:16px; border:1px solid rgba(15,23,42,.12);"></div>
        </div>
    @endif

    <div class="row g-3">
        @forelse($rutes as $r)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card-simaksi overflow-hidden h-100">
                    <div style="height:200px; background:#f1f5f9;">
                        <img src="{{ asset('images/rute/default.jpg') }}" alt="{{ $r->nama_rute }}" class="w-100 h-100" style="object-fit:cover;">
                    </div>
                    <div class="p-4">
                        <span class="badge badge-simaksi bg-success text-white px-3 py-2 fw-bold mb-2 d-inline-flex align-items-center">
                            <i class="fa fa-mountain me-1"></i>{{ $gunung->nama_gunung }}
                        </span>
                        <h2 class="h5 fw-bold mb-2">{{ $r->nama_rute }}</h2>

                        <div class="text-muted" style="line-height:1.7; font-size:.95rem;">
                            <div class="d-flex align-items-start gap-2 mb-1">
                                <i class="fa fa-tag" style="color:#15803d; margin-top:2px;"></i>
                                <span><strong>Harga:</strong> Rp {{ number_format($r->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="d-flex align-items-start gap-2">
                                <i class="fa fa-info-circle" style="color:#15803d; margin-top:2px;"></i>
                                <span><strong>Deskripsi:</strong> {{ $r->deskripsi ?? 'Tidak ada deskripsi.' }}</span>
                            </div>
                        </div>

                        <a href="{{ route('pendaftaran.create.with.params', ['gunung_id' => $gunung->id_gunung, 'rute_id' => $r->id_rute]) }}" class="btn btn-simaksi-primary w-100 fw-bold rounded-4 mt-3">
                            <i class="fa fa-file-pen me-2"></i> Daftar SIMAKSI
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card-simaksi p-4 text-center">
                    <div class="fw-bold mb-1">Tidak ada data rute pendakian</div>
                    <div class="text-muted" style="font-size:.95rem;">Coba pilih gunung lainnya.</div>
                </div>
            </div>
        @endforelse
    </div>
</section>
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
