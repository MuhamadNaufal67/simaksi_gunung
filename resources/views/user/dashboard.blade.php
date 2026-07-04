@extends('layouts.main')

@section('title', 'Dashboard SIMAKSI.COM')

@section('content')
<style>
  .dashboard-hero{background:linear-gradient(135deg,#0f4a34 0%,#1e7a52 100%);color:#fff;padding:28px 32px;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,.12);display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:28px}
  .hero-title{margin:0;font-weight:700;letter-spacing:.2px}
  .hero-sub{opacity:.9;font-size:.95rem;margin-top:4px}
  .btn-formulir{background:#2cc36b;color:#fff;padding:12px 20px;border-radius:12px;font-weight:600;text-decoration:none;box-shadow:0 6px 16px rgba(44,195,107,.25);transition:.2s}
  .btn-formulir:hover{background:#25a65b;transform:translateY(-1px)}
  .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin:24px 0 32px}
  .stat{background:#fff;border-radius:14px;padding:18px;display:flex;align-items:center;gap:14px;box-shadow:0 6px 18px rgba(0,0,0,.06);transition:.2s}
  .stat:hover{transform:translateY(-3px);box-shadow:0 10px 24px rgba(0,0,0,.08)}
  .stat .icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px}
  .stat .meta{line-height:1.2}
  .stat .label{color:#667085;font-weight:600;font-size:.9rem}
  .stat .value{font-size:1.6rem;font-weight:800;color:#0e3d2c}
  .i-green{background:#e7f7ef;color:#1e7e34}.i-amber{background:#fff3cd;color:#996c00}.i-sky{background:#e8f0fe;color:#1e5ddf}.i-rose{background:#fde2e1;color:#c0262d}
  .section-title{display:flex;align-items:center;gap:10px;font-size:1.1rem;font-weight:800;color:#0e3d2c;margin:8px 0 14px}
  .section-title i{color:#1e7e34}
  .status-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin-bottom:28px}
  .status-card{background:#fff;border-radius:14px;padding:16px;text-align:center;box-shadow:0 6px 18px rgba(0,0,0,.06)}
  .status-card .big{font-size:22px;margin-bottom:6px}
  .status-card small{color:#667085}
  .status-approved{background:#e6f7ed;color:#1e7e34}.status-pending{background:#fff8e5;color:#856404}.status-rejected{background:#fdecea;color:#c82333}
  .gunung-list{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px}
  .gunung-card{background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 6px 18px rgba(0,0,0,.06);transition:.2s}
  .gunung-card:hover{transform:translateY(-3px)}
  .gunung-card .thumb{aspect-ratio:16/9;width:100%;object-fit:cover}
  .gunung-card-body{padding:14px 16px}
  .gunung-card-body h5{margin:0 0 6px;font-weight:800;color:#155c3b}
  .gunung-card-body p{margin:0 0 8px;color:#667085;font-size:.92rem}
  .footer-dashboard{margin-top:36px;text-align:center;font-size:.9rem;color:#667085}
</style>

<div class="dashboard-hero">
  <div>
    <h2 class="hero-title">Selamat datang, {{ Auth::user()->name ?? 'Pendaki' }} 👋</h2>
    <div class="hero-sub">Kelola pendaftaran, pantau status, dan jelajahi gunung populer.</div>
  </div>
  <a href="{{ route('pendaftaran.create') }}" class="btn-formulir"><i class="fa fa-file-pen me-1"></i> Isi Formulir SIMAKSI</a>
</div>

<div class="stats">
  <div class="stat">
    <div class="icon i-sky"><i class="fa fa-clipboard-list"></i></div>
    <div class="meta">
      <div class="label">Total Pendaftaran</div>
      <div class="value">{{ $totalPendaftaran ?? 0 }}</div>
    </div>
  </div>
  <div class="stat">
    <div class="icon i-amber"><i class="fa fa-clock"></i></div>
    <div class="meta">
      <div class="label">Menunggu Persetujuan</div>
      <div class="value">{{ $menunggu ?? 0 }}</div>
    </div>
  </div>
  <div class="stat">
    <div class="icon i-green"><i class="fa fa-check"></i></div>
    <div class="meta">
      <div class="label">Disetujui</div>
      <div class="value">{{ $disetujui ?? 0 }}</div>
    </div>
  </div>
  <div class="stat">
    <div class="icon i-rose"><i class="fa fa-wallet"></i></div>
    <div class="meta">
      <div class="label">Belum Bayar</div>
      <div class="value">{{ $belumBayar ?? 0 }}</div>
    </div>
  </div>
</div>

@if($pendaftaranSaya->whereNotNull('peminjaman_id')->count() > 0)
  <div class="section-title"><i class="fa fa-toolbox"></i> Status Peminjaman Alat</div>
  <div class="status-grid">
    @foreach($pendaftaranSaya->whereNotNull('peminjaman_id') as $pendaftaran)
      <div class="status-card">
        <div class="big">
          @if($pendaftaran->status_peminjaman == 'disetujui')
            <span class="badge status-approved px-3 py-2 rounded"><i class="fa fa-check me-1"></i> Disetujui</span>
          @elseif($pendaftaran->status_peminjaman == 'menunggu')
            <span class="badge status-pending px-3 py-2 rounded"><i class="fa fa-clock me-1"></i> Menunggu</span>
          @elseif($pendaftaran->status_peminjaman == 'ditolak')
            <span class="badge status-rejected px-3 py-2 rounded"><i class="fa fa-times me-1"></i> Ditolak</span>
          @else
            <span class="badge bg-secondary px-3 py-2">Unknown</span>
          @endif
        </div>
        <div class="fw-bold">{{ $pendaftaran->rutePendakian->gunung->nama_gunung ?? 'Unknown' }}</div>
        <small>{{ \Carbon\Carbon::parse($pendaftaran->tanggal_pendakian)->format('Y-m-d') }}</small>
      </div>
    @endforeach
  </div>
@endif

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
