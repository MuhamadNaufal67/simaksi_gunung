@extends('admin.layouts.app')

@section('title', 'Manajemen Pembayaran - Admin')

@section('content')
<div class="container mt-5">
    <h2>💳 Riwayat Pembayaran</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar Gunung</th>
                <th>Pendaftar</th>
                <th>Gunung</th>
                <th>Rute</th>
                <th>Jumlah Bayar</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembayarans as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($p->pendaftaran->gunung && $p->pendaftaran->gunung->gambar)
                            <img src="{{ asset('images/gunung/' . $p->pendaftaran->gunung->gambar) }}" alt="{{ $p->pendaftaran->gunung->nama_gunung }}" width="80" height="60" class="rounded">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $p->pendaftaran->user->nama_lengkap ?? 'N/A' }}</td>
                    <td>{{ $p->pendaftaran->gunung->nama_gunung ?? 'N/A' }}</td>
                    <td>{{ $p->pendaftaran->rutePendakian->nama_rute ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($p->pendaftaran->total_biaya ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $p->metode_pembayaran ?? 'Midtrans' }}</td>
                    <td>
                        @if($p->status == 'success')
                            <span class="badge bg-success">Berhasil</span>
                        @elseif($p->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($p->status == 'failed')
                            <span class="badge bg-danger">Gagal</span>
                        @else
                            <span class="badge bg-secondary">{{ $p->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.pembayaran.show', $p->id_pembayaran) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.pembayaran.edit', $p->id_pembayaran) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.pembayaran.destroy', $p->id_pembayaran) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" class="text-center text-muted">Belum ada data pembayaran</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
