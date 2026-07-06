@extends('layouts.main')

@section('title', 'Dashboard SIMAKSI.COM')

@section('content')

<div class="container-fluid px-0">
  <div class="card-simaksi p-4 p-md-5" style="border-radius:16px; background: linear-gradient(135deg, #0f4a34 0%, #1e7a52 100%); border: 0; color: #fff; box-shadow: 0 10px 30px rgba(0,0,0,.12);">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
      <div>
        <h1 class="h2 fw-bold mb-1" style="font-size: clamp(1.25rem, 2vw, 2rem); letter-spacing: .2px;">Selamat datang, {{ Auth::user()->name ?? 'Pendaki' }} 👋</h1>
        <p class="mb-0" style="opacity:.9; font-size:.98rem;">Kelola pendaftaran, pantau status, dan jelajahi gunung populer.</p>
      </div>
      <a href="{{ route('pendaftaran.create') }}" class="btn btn-simaksi-primary btn-lg fw-bold" style="border-radius:12px; padding:12px 20px;">
        <i class="fa fa-file-pen me-2"></i> Isi Formulir SIMAKSI
      </a>
    </div>
  </div>

  <div class="row g-3 mt-4">
    <div class="col-12 col-md-6 col-lg-3">

      <div class="card-simaksi p-4 h-100">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:#e8f0fe;color:#1e5ddf;">
            <i class="fa fa-clipboard-list"></i>
          </div>
          <div>
            <div class="text-muted fw-semibold" style="font-size:.95rem;">Total Pendaftaran</div>
            <div class="fw-bold" style="font-size:1.6rem;">{{ $totalPendaftaran ?? 0 }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
      <div class="card-simaksi p-4 h-100">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:#fff3cd;color:#996c00;">
            <i class="fa fa-clock"></i>
          </div>
          <div>
            <div class="text-muted fw-semibold" style="font-size:.95rem;">Menunggu Persetujuan</div>
            <div class="fw-bold" style="font-size:1.6rem;">{{ $menunggu ?? 0 }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
      <div class="card-simaksi p-4 h-100">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:#e7f7ef;color:#1e7e34;">
            <i class="fa fa-check"></i>
          </div>
          <div>
            <div class="text-muted fw-semibold" style="font-size:.95rem;">Disetujui</div>
            <div class="fw-bold" style="font-size:1.6rem;">{{ $disetujui ?? 0 }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
      <div class="card-simaksi p-4 h-100">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:#fde2e1;color:#c0262d;">
            <i class="fa fa-wallet"></i>
          </div>
          <div>
            <div class="text-muted fw-semibold" style="font-size:.95rem;">Belum Bayar</div>
            <div class="fw-bold" style="font-size:1.6rem;">{{ $belumBayar ?? 0 }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if($pendaftaranSaya->whereNotNull('peminjaman_id')->count() > 0)
    <div class="mt-5">
      <div class="d-flex align-items-center gap-2 mb-3">
        <div class="rounded-3" style="background: rgba(40,167,69,.12); width:34px; height:34px; display:flex; align-items:center; justify-content:center; color:#28a745;">
          <i class="fa fa-toolbox"></i>
        </div>
        <h2 class="h4 fw-bold mb-0" style="font-size:1.1rem;">Status Peminjaman Alat</h2>
      </div>

      <div class="row g-3">
        @foreach($pendaftaranSaya->whereNotNull('peminjaman_id') as $pendaftaran)
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card-simaksi p-4 text-center h-100">
              <div class="mb-3">
                @php
                  $sp = $pendaftaran->status_peminjaman;
                @endphp

                @if($sp == 'disetujui')
                  <span class="badge bg-success rounded-pill px-3 py-2 fw-bold"><i class="fa fa-check me-1"></i> Disetujui</span>
                @elseif($sp == 'menunggu')
                  <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold"><i class="fa fa-clock me-1"></i> Menunggu</span>
                @elseif($sp == 'ditolak')
                  <span class="badge bg-danger rounded-pill px-3 py-2 fw-bold"><i class="fa fa-times me-1"></i> Ditolak</span>
                @else
                  <span class="badge bg-secondary rounded-pill px-3 py-2 fw-bold">Unknown</span>
                @endif
              </div>
              <div class="fw-bold" style="font-size:1.05rem;">{{ $pendaftaran->rutePendakian->gunung->nama_gunung ?? 'Unknown' }}</div>
              <small class="text-muted">{{ \Carbon\Carbon::parse($pendaftaran->tanggal_pendakian)->format('Y-m-d') }}</small>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif


{{-- legacy stats markup removed --}}
</div>

@php
    use Illuminate\Support\Str;
    if (! function_exists('asset_gunung_img')) {
        function asset_gunung_img($name) {
            $slug = Str::slug($name);
            $base = public_path('images/gunung');
            $map = [
                'rinjani' => 'GunungRinjani.jpg',
                'semeru' => 'Gunung_semeru.jpg',
                'merapi'  => 'GunungMerapi.jpg',
                'kerinci' => 'Gunung_Kerinci.png',
                'lawu'    => 'GunungLawu.jpg',
                'merbabu' => 'GunungMerbabu.jpg',
                'sindoro' => 'GunungSindoro.jpg',
                'slamet'  => 'GunungSlamet.jpg',
                'prau'    => 'GunungPrau.jpg',
                'arjuno'  => 'arjuno.jpg',
                'bromo'   => 'GunungBromo.jpg',
                'ceremai' => 'GunungCeremai.jpg',
                'gede'    => 'gunung gede.jpg',
                'agung'   => 'GunungAgung.jpg',
                'sindoro-sumbing' => 'Sindoro_Sumbing.jpg',
            ];
            if (isset($map[$slug])) {
                return asset('images/gunung/'.$map[$slug]);
            }
            $candidates = [
                $slug.'.jpg', $slug.'.jpeg', $slug.'.png',
                'Gunung'.Str::studly($slug).'.jpg', ucfirst($slug).'.jpg'
            ];
            foreach ($candidates as $f) {
                if (file_exists($base.DIRECTORY_SEPARATOR.$f)) return asset('images/gunung/'.$f);
            }
            return asset('images/background.jpg');
        }
    }
@endphp

<div class="section-title"><i class="fa fa-fire"></i> Gunung Populer Minggu Ini</div>
<div class="gunung-list">
  @forelse($gunungPopuler as $gunung)
    <div class="gunung-card">
      <img class="thumb" src="{{ asset_gunung_img($gunung->nama_gunung) }}" alt="{{ $gunung->nama_gunung }}">
      <div class="gunung-card-body">
        <h5>{{ $gunung->nama_gunung }}</h5>
        <p>Ketinggian: {{ number_format($gunung->ketinggian, 0, ',', '.') }} mdpl</p>
        <small>{{ $gunung->pendaki_minggu_ini ?? 0 }} pendaki minggu ini</small>
      </div>
    </div>
  @empty
    <p class="text-muted">Belum ada data gunung populer minggu ini.</p>
  @endforelse
</div>

<div class="footer-dashboard">&copy; {{ date('Y') }} SIMAKSI.COM · Jelajahi Alam Indonesia dengan Aman</div>
@endsection
