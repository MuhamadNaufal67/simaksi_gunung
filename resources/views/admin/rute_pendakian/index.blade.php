@extends('admin.layouts.app')

@section('title', 'Manajemen Rute Pendakian - Admin')

@section('content')
<div class="container mt-5">
    <h2>🗺️ Manajemen Rute Pendakian</h2>
    <a href="{{ route('admin.rute-pendakian.create') }}" class="btn btn-success mb-3">+ Tambah Rute Pendakian</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar Gunung</th>
                <th>Nama Rute</th>
                <th>Gunung</th>
                <th>Harga (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rute_pendakians as $rute)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($rute->gunung && $rute->gunung->gambar)
                            <img src="{{ asset('images/gunung/' . $rute->gunung->gambar) }}" alt="{{ $rute->gunung->nama_gunung }}" width="80" height="60" class="rounded">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $rute->nama_rute }}</td>
                    <td>{{ $rute->gunung->nama_gunung ?? 'N/A' }}</td>
                    <td>Rp {{ number_format($rute->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.rute-pendakian.edit', $rute->id_rute) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.rute-pendakian.destroy', $rute->id_rute) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">Belum ada data rute pendakian</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
