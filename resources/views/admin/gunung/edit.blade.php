@extends('admin.layouts.app')

@section('title', 'Edit Gunung - Admin')

@section('content')
<div class="container mt-5">
    <h2>✏️ Edit Data Gunung</h2>
    <a href="{{ route('admin.gunung.index') }}" class="btn btn-secondary mb-3">⬅️ Kembali</a>

    <form action="{{ route('admin.gunung.update', $gunung->id_gunung) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_gunung" class="form-label fw-bold">Nama Gunung</label>
            <input type="text" name="nama_gunung" id="nama_gunung" class="form-control" value="{{ old('nama_gunung', $gunung->nama_gunung) }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label fw-bold">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $gunung->lokasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label fw-bold">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $gunung->latitude) }}" placeholder="Contoh: -8.1083">
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label fw-bold">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $gunung->longitude) }}" placeholder="Contoh: 112.9075">
        </div>

        <div class="mb-3">
            <label for="ketinggian" class="form-label fw-bold">Ketinggian (mdpl)</label>
            <input type="number" name="ketinggian" id="ketinggian" class="form-control" value="{{ old('ketinggian', $gunung->ketinggian) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga_simaksi" class="form-label fw-bold">Harga SIMAKSI (Rp)</label>
            <input type="number" name="harga_simaksi" id="harga_simaksi" class="form-control" value="{{ old('harga_simaksi', $gunung->harga_simaksi) }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $gunung->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label fw-bold">Gambar Gunung</label><br>
            @if($gunung->gambar)
                <img src="{{ asset('images/gunung/' . $gunung->gambar) }}" alt="Gambar {{ $gunung->nama_gunung }}" width="150" class="mb-2 rounded">
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary px-4">💾 Perbarui</button>
    </form>
</div>
@endsection
