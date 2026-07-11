@extends('layouts.main')

@section('title', $gunung->nama_gunung)

@section('content')
<section class="container py-4 py-md-5">
    {{-- Hero --}}
    <div class="card-simaksi overflow-hidden mb-4" style="background:linear-gradient(135deg,#0f4a34 0%,#1e7a52 100%); color:#fff; border:0;">
        <div class="p-4 p-md-5">
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
                <div>
                    <h1 class="h2 fw-bold mb-2">{{ $gunung->nama_gunung }}</h1>
                    <p class="mb-0 text-white-50 fw-semibold">Informasi resmi untuk rute dan pendakian yang lebih terarah</p>
                </div>
                <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                    <span class="badge badge-simaksi bg-light text-dark rounded-pill px-3 py-2 fw-bold">
                        <i class="fa fa-map-marker-alt me-1"></i> {{ $gunung->lokasi }}
                    </span>
                    <span class="badge badge-simaksi bg-success text-white rounded-pill px-3 py-2 fw-bold">
                        <i class="fa fa-mountain me-1"></i> {{ number_format($gunung->ketinggian,0,',','.') }} mdpl
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-8">
            {{-- Gallery/Media --}}
            <div class="card-simaksi overflow-hidden mb-4">
                <div class="row g-0">
                    <div class="col-12">
                        @if($gunung->gambar)
                            <div style="height: 320px; background:#f1f5f9;">
                                <img src="{{ asset('images/gunung/' . $gunung->gambar) }}" alt="{{ $gunung->nama_gunung }}"
                                     class="w-100 h-100" style="object-fit:cover;">
                            </div>
                        @else
                            <div class="p-5 text-center">
                                <div class="text-muted">Tidak ada gambar untuk gunung ini.</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Informasi --}}
            <div class="card-simaksi p-4 mb-4">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="fa fa-info-circle" style="color:#15803d;"></i>
                    <h2 class="h4 fw-bold mb-0">Informasi</h2>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="text-muted fw-semibold mb-1">Ketinggian</div>
                        <div class="fw-bold">{{ number_format($gunung->ketinggian,0,',','.') }} mdpl</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="text-muted fw-semibold mb-1">Harga SIMAKSI</div>
                        <div class="fw-bold">Rp {{ number_format($gunung->harga_simaksi ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>

                <hr class="my-4" style="border-color: var(--simaksi-border, rgba(15,23,42,.12));">

                <div class="text-muted" style="line-height:1.8;">
                    {{ $gunung->deskripsi }}
                </div>
            </div>

            {{-- Fasilitas --}}
            <div class="card-simaksi p-4 mb-4">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="fa fa-cogs" style="color:#15803d;"></i>
                    <h2 class="h4 fw-bold mb-0">Fasilitas</h2>
                </div>
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="d-flex gap-2 align-items-start">
                            <i class="fa fa-check-circle text-success mt-1"></i>
                            <div>
                                <div class="fw-bold">Panduan Pendakian</div>
                                <div class="text-muted" style="line-height:1.7;">Akses panduan keselamatan sebelum memulai.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex gap-2 align-items-start">
                            <i class="fa fa-check-circle text-success mt-1"></i>
                            <div>
                                <div class="fw-bold">Informasi Lokasi</div>
                                <div class="text-muted" style="line-height:1.7;">Tersedia peta lokasi gunung (jika koordinat tersedia).</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Peta (tetap business logic/JS) --}}
            @if($gunung->latitude && $gunung->longitude)
                <div class="card-simaksi p-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <i class="fa fa-map" style="color:#15803d;"></i>
                        <h2 class="h4 fw-bold mb-0">Lokasi di Peta</h2>
                    </div>
                    <div id="map" class="w-100" style="height:420px; border-radius:16px; border:1px solid rgba(15,23,42,.12);"></div>
                </div>
            @endif
        </div>

        <div class="col-12 col-lg-4">
            <div class="card-simaksi p-4 sticky-top" style="top: 90px;">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fa fa-briefcase" style="color:#15803d;"></i>
                    <h2 class="h4 fw-bold mb-0">Ringkasan</h2>
                </div>

                <div class="d-grid gap-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fw-semibold">Gunung</span>
                        <span class="fw-bold">{{ $gunung->nama_gunung }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fw-semibold">Lokasi</span>
                        <span class="fw-bold text-end">{{ $gunung->lokasi }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fw-semibold">Harga SIMAKSI</span>
                        <span class="fw-bold">Rp {{ number_format($gunung->harga_simaksi ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>

                <hr class="my-4" style="border-color: var(--simaksi-border, rgba(15,23,42,.12));">

                <a href="{{ route('rute.by-gunung', $gunung->id_gunung) }}" class="btn btn-simaksi-primary w-100 fw-bold rounded-4 py-2">
                    <i class="fa fa-paper-plane me-2"></i> Lihat Rute & Daftar
                </a>

                <a href="{{ route('panduan') }}" class="btn btn-simaksi-secondary w-100 fw-bold rounded-4 py-2">
                    <i class="fa fa-book me-2"></i> Baca Panduan
                </a>
            </div>
        </div>
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

