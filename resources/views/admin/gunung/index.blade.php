@extends('admin.layouts.app')

@section('title', 'Manajemen Gunung - Admin')

@section('content')
<div class="container mt-5">
    <h2>🗻 Manajemen Data Gunung</h2>
    <a href="{{ route('admin.gunung.create') }}" class="btn btn-success mb-3">+ Tambah Gunung</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Gunung</th>
                <th>Lokasi</th>
                <th>Tinggi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gunungs as $g)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($g->gambar)
                            <img src="{{ asset('images/gunung/' . $g->gambar) }}" alt="{{ $g->nama_gunung }}" width="80" height="60" class="rounded">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $g->nama_gunung }}</td>
                    <td>{{ $g->lokasi }}</td>
                    <td>{{ $g->ketinggian }} mdpl</td>
                    <td>
                        <a href="{{ route('admin.gunung.edit', $g->id_gunung) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.gunung.destroy', $g->id_gunung) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">Belum ada data gunung</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
