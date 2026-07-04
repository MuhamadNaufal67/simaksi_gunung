@extends('layouts.main')

@section('title', 'Daftar Pendaftaran SIMAKSI')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body bg-gradient-primary text-white rounded-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h3 mb-1 fw-bold">📋 Daftar Pendaftaran SIMAKSI</h1>
                            <p class="mb-0 opacity-75">Kelola dan pantau status pendaftaran pendakian Anda</p>
                        </div>
                        <a href="{{ route('pendaftaran.create') }}" class="btn btn-light btn-lg rounded-pill shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success') && str_contains(session('success'), 'pendaftaran'))
        <div class="row mb-4">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-clipboard-list text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Pendaftaran</h6>
                            <h4 class="mb-0 fw-bold">{{ $pendaftarans->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-clock text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Menunggu Persetujuan</h6>
                            <h4 class="mb-0 fw-bold">{{ $pendaftarans->where('status', 'pending')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-check-circle text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Disetujui</h6>
                            <h4 class="mb-0 fw-bold">{{ $pendaftarans->where('status', 'disetujui')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="bg-danger bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-exclamation-triangle text-danger fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Belum Bayar</h6>
                            <h4 class="mb-0 fw-bold">{{ $pendaftarans->where('status_pembayaran', 'belum')->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold text-dark">📊 Detail Pendaftaran</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0 fw-bold text-muted py-3 px-4">#</th>
                                    <th class="border-0 fw-bold text-muted py-3">Pendaftar</th>
                                    <th class="border-0 fw-bold text-muted py-3">Gunung</th>
                                    <th class="border-0 fw-bold text-muted py-3">Rute</th>
                                    <th class="border-0 fw-bold text-muted py-3">Tanggal Naik</th>
                                    <th class="border-0 fw-bold text-muted py-3">Tanggal Turun</th>
                                    <th class="border-0 fw-bold text-muted py-3">Jumlah Pendaki</th>
                                    <th class="border-0 fw-bold text-muted py-3">ID Peminjaman</th>
                                    <th class="border-0 fw-bold text-muted py-3">Status</th>
                                    <th class="border-0 fw-bold text-muted py-3">Pembayaran</th>
                                    <th class="border-0 fw-bold text-muted py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendaftarans as $p)
                                    <tr class="align-middle">
                                        <td class="py-3 px-4 fw-bold text-primary">#{{ $loop->iteration }}</td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm bg-primary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-user text-primary"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $p->user->nama_lengkap ?? $p->user->name ?? '-' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-mountain text-success me-2"></i>
                                                <span class="fw-semibold">{{ $p->rutePendakian->gunung->nama_gunung ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-route text-info me-2"></i>
                                                <span class="fw-semibold">{{ $p->rutePendakian->nama_rute ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-calendar-alt text-warning me-2"></i>
                                                <span>{{ \Carbon\Carbon::parse($p->tanggal_pendakian)->format('d M Y') }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            @if($p->tanggal_turun)
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-calendar-check text-secondary me-2"></i>
                                                    <span>{{ \Carbon\Carbon::parse($p->tanggal_turun)->format('d M Y') }}</span>
                                                </div>
                                            @else
                                                <span class="text-muted fst-italic">Belum ditentukan</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-users text-primary me-2"></i>
                                                <span class="fw-bold">{{ $p->jumlah_pendaki ?? 1 }} orang</span>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            @if($p->peminjaman_id)
                                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-2">
                                                    <i class="fas fa-tools me-1"></i>{{ $p->peminjaman_id }}
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($p->status == 'disetujui')
                                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2">
                                                    <i class="fas fa-check-circle me-1"></i>Disetujui
                                                </span>
                                            @elseif($p->status == 'ditolak')
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-2">
                                                    <i class="fas fa-times-circle me-1"></i>Ditolak
                                                </span>
                                            @else
                                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2">
                                                    <i class="fas fa-clock me-1"></i>Menunggu
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($p->status_pembayaran == 'lunas')
                                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2">
                                                    <i class="fas fa-check me-1"></i>Lunas
                                                </span>
                                            @else
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-2">
                                                    <i class="fas fa-exclamation-triangle me-1"></i>Belum Bayar
                                                </span>
                                                <div class="small text-muted mt-1">Bayar saat pendaftaran</div>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($p->status == 'disetujui')
                                                <a href="{{ route('pendaftaran.cetak', $p->id_pendaftaran) }}" class="btn btn-primary btn-sm rounded-pill px-3">
                                                    <i class="fas fa-download me-1"></i>Cetak PDF
                                                </a>
                                            @elseif($p->status == 'ditolak')
                                                <span class="text-danger small">
                                                    <i class="fas fa-info-circle me-1"></i>Hubungi Admin
                                                </span>
                                            @else
                                                <span class="text-muted small">
                                                    <i class="fas fa-spinner fa-spin me-1"></i>Menunggu
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <h5 class="text-muted">Belum Ada Data Pendaftaran</h5>
                                                <p class="text-muted mb-3">Klik tombol "Tambah Pendaftaran" untuk memulai</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #0e3d2c 0%, #155c3b 100%);
}

.avatar {
    width: 40px;
    height: 40px;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.025);
}

.card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
}

.btn {
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }

    .table-responsive {
        border-radius: 0.375rem;
    }

    .card-body {
        padding: 1rem;
    }
}
</style>
@endsection
