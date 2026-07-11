@extends('layouts.main')

@section('title', 'Rute Pendakian Resmi - SIMAKSI')

@section('content')
<section class="container py-4 py-md-5">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-2">🥾 Rute Pendakian Resmi</h1>
            <p class="text-muted mb-0">Jalur pendakian resmi untuk keamanan dan kelestarian alam.</p>
        </div>
    </div>

    @if($rutes->isEmpty())
        <div class="card-simaksi p-4 text-center">
            <div class="fw-bold mb-1">Tidak ada data rute pendakian</div>
            <div class="text-muted" style="font-size:.95rem;">Coba kunjungi gunung lainnya.</div>
        </div>
    @else
        <div class="row g-3">
            @foreach($rutes as $r)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-simaksi overflow-hidden h-100">
                        <div style="height:200px; background:#f1f5f9;">
                            <img src="{{ asset('images/rute/default.jpg') }}" alt="{{ $r->nama_rute }}" class="w-100 h-100" style="object-fit:cover;">
                        </div>

                        <div class="p-4">
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                                <span class="badge badge-simaksi bg-success text-white px-3 py-2 fw-bold">
                                    <i class="fa fa-mountain me-1"></i>{{ $r->gunung->nama_gunung ?? 'Gunung Tidak Diketahui' }}
                                </span>
                            </div>

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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
