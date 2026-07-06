@extends('layouts.main')

@section('content')

<div class="container">
    <h1>Edit Pendaftaran</h1>

```
@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('pendaftaran.update', $pendaftaran->id_pendaftaran) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>User</label>
        <select name="id_user" class="form-control" required>
            @foreach($users as $u)
                <option value="{{ $u->id }}" {{ $pendaftaran->id_user == $u->id ? 'selected' : '' }}>
                    {{ $u->nama_lengkap ?? $u->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Gunung</label>
        <select name="id_gunung" class="form-control" required>
            @foreach($gunungs as $g)
                <option value="{{ $g->id_gunung }}" {{ $pendaftaran->id_gunung == $g->id_gunung ? 'selected' : '' }}>
                    {{ $g->nama_gunung }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Rute</label>
        <select name="id_rute" class="form-control" required>
            @foreach($rutes as $r)
                <option value="{{ $r->id_rute }}" {{ $pendaftaran->id_rute == $r->id_rute ? 'selected' : '' }}>
                    {{ $r->nama_rute }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Tanggal Naik</label>
            <input type="date" name="tanggal_naik" class="form-control" value="{{ $pendaftaran->tanggal_naik }}">
        </div>
        <div class="col-md-6 mb-3">
            <label>Tanggal Turun</label>
            <input type="date" name="tanggal_turun" class="form-control" value="{{ $pendaftaran->tanggal_turun }}">
        </div>
    </div>

    <div class="mb-3">
        <label>Jumlah Pendaki</label>
        <input type="number" name="jumlah_pendaki" class="form-control" value="{{ $pendaftaran->jumlah_pendaki }}">
    </div>

    <div class="mb-3">
        <label>Status Pendaftaran</label>
        <select name="status_pendaftaran" class="form-control">
            <option value="pending" {{ $pendaftaran->status_pendaftaran == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ $pendaftaran->status_pendaftaran == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ $pendaftaran->status_pendaftaran == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Status Pembayaran</label>
        <select name="status_pembayaran" class="form-control">
            <option value="belum_bayar" {{ $pendaftaran->status_pembayaran == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
            <option value="lunas" {{ $pendaftaran->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
        </select>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
</form>
```

</div>
@endsection
