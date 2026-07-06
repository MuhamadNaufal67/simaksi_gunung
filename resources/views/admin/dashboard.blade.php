@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="page-heading">
    <h1>Dashboard Admin</h1>
    <p>Ringkasan aktivitas SIMAKSI hari ini.</p>
</div>

<!-- Statistics Cards -->
<div class="row g-3 g-lg-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-blue"><i class="fas fa-users"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Users</span>
                <span class="stat-value">{{ $stats['total_users'] }}</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-green"><i class="fas fa-mountain"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Gunung</span>
                <span class="stat-value">{{ $stats['total_gunung'] }}</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-sky"><i class="fas fa-route"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Rute</span>
                <span class="stat-value">{{ $stats['total_rute'] }}</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-amber"><i class="fas fa-clipboard-list"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Pendaftaran</span>
                <span class="stat-value">{{ $stats['total_pendaftaran'] }}</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-slate"><i class="fas fa-tools"></i></div>
            <div class="stat-info">
                <span class="stat-label">Total Peminjaman</span>
                <span class="stat-value">{{ $stats['total_peminjaman'] }}</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-sky"><i class="fas fa-clock"></i></div>
            <div class="stat-info">
                <span class="stat-label">Peminjaman Menunggu</span>
                <span class="stat-value">{{ $stats['peminjaman_menunggu'] }}</span>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon stat-icon-green"><i class="fas fa-check-circle"></i></div>
            <div class="stat-info">
                <span class="stat-label">Peminjaman Disetujui</span>
                <span class="stat-value">{{ $stats['peminjaman_disetujui'] }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Recent Pendaftaran Table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Pendaftaran Terbaru
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Gunung</th>
                                <th>Rute</th>
                                <th>Tanggal Pendakian</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_pendaftaran as $pendaftaran)
                            <tr>
                                <td>{{ $pendaftaran->id_pendaftaran }}</td>
                                <td>{{ $pendaftaran->user->nama_lengkap }}</td>
                                <td>{{ $pendaftaran->gunung->nama_gunung }}</td>
                                <td>{{ $pendaftaran->rutePendakian->nama_rute }}</td>
                                <td>{{ $pendaftaran->tanggal_pendakian }}</td>
                                <td>
                                    <span class="badge badge-{{ $pendaftaran->status == 'disetujui' ? 'success' : ($pendaftaran->status == 'ditolak' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($pendaftaran->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.pendaftaran.show', $pendaftaran->id_pendaftaran) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
