@extends('layouts.main')

@section('title', 'Daftar Gunung')

@section('content')
<section class="container py-4 py-md-5">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-2">🌄 Daftar Gunung di Indonesia</h1>
            <p class="text-muted mb-0">Temukan informasi lengkap tentang gunung dan rute pendakian di Indonesia.</p>
        </div>

        @if(isset($query))
            <div class="card-simaksi p-3" style="min-width:260px;">
                <div class="text-muted fw-semibold" style="font-size:.95rem;">Hasil pencarian</div>
                <div class="fw-bold">"{{ $query }}"</div>
                <div class="text-muted" style="font-size:.9rem;">{{ $gunungs->count() }} hasil</div>
            </div>
        @endif
    </div>

    <div class="mb-3">
        <div class="card-simaksi p-3">
            <form class="row g-2 align-items-center" method="GET" action="{{ url()->current() }}" data-search-form>
                <div class="col-12 col-md-8">
                    <label class="form-label mb-1">Cari gunung</label>
                    <input type="text" name="q" class="form-control" value="{{ request()->get('q') }}" placeholder="Masukkan nama gunung..." data-search-input maxlength="100">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label mb-1">&nbsp;</label>
                    <button type="submit" class="btn btn-simaksi-primary w-100 fw-bold">
                        <i class="fa fa-search me-2"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if($gunungs->isEmpty())
        <div class="card-simaksi p-4 text-center">
            <div class="fw-bold mb-1">Belum ada data gunung</div>
            <div class="text-muted" style="font-size:.95rem;">Coba ubah kata kunci pencarian.</div>
        </div>
    @else
        <div class="row g-3">
            @foreach($gunungs as $gunung)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-simaksi overflow-hidden h-100" style="transition: transform .2s ease, box-shadow .2s ease;">
                        <a href="{{ route('rute.by-gunung', $gunung->id_gunung) }}" class="text-decoration-none text-reset">
                            <div style="height:180px; background:#f1f5f9;">
                                <img src="{{ asset('images/gunung/' . ($gunung->gambar ?? 'default.jpg')) }}"
                                     alt="{{ $gunung->nama_gunung }}"
                                     class="w-100 h-100" style="object-fit:cover;">
                            </div>

                            <div class="p-4">
                                <div class="d-flex align-items-start justify-content-between gap-2 mb-2">
                                    <h2 class="h5 fw-bold mb-0">{{ $gunung->nama_gunung }}</h2>
                                    <span class="badge badge-simaksi bg-success text-white">Rp {{ number_format($gunung->harga_simaksi, 0, ',', '.') }}</span>
                                </div>

                                <p class="text-muted mb-3" style="line-height:1.65;">
                                    {{ Str::limit($gunung->deskripsi, 120) }}
                                </p>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-muted fw-semibold" style="font-size:.95rem;">
                                        <i class="fa fa-map-marker-alt me-2" style="color:#15803d;"></i>{{ $gunung->lokasi }}
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-3">
                                    <a href="{{ route('rute.by-gunung', $gunung->id_gunung) }}" class="btn btn-simaksi-primary btn-sm fw-bold rounded-4">
                                        Lihat Rute
                                    </a>
                                    @if($gunung->latitude && $gunung->longitude)
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ $gunung->latitude }},{{ $gunung->longitude }}" target="_blank" class="btn btn-simaksi-secondary btn-sm fw-bold rounded-4">
                                            <i class="fa fa-map me-1"></i> Maps
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination (links hanya jika data paginate). Untuk koleksi biasa, hindari error links(). --}}
        <div class="mt-4">
            @if(method_exists($gunungs, 'links'))
                {{ $gunungs->links() }}
            @endif
        </div>
    @endif
</section>
@endsection

