@extends('layouts.main')

@section('title', $gunung->nama_gunung)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                @if($gunung->gambar)
                    <img src="{{ asset('images/gunung/' . $gunung->gambar) }}" class="card-img-top" alt="{{ $gunung->nama_gunung }}">
                @endif
                <div class="card-body">
                    <h2>{{ $gunung->nama_gunung }}</h2>
                    <p><strong>Lokasi:</strong> {{ $gunung->lokasi }}</p>
                    <p><strong>Ketinggian:</strong> {{ number_format($gunung->ketinggian,0,',','.') }} mdpl</p>
                    <p><strong>Harga SIMAKSI:</strong> Rp {{ number_format($gunung->harga_simaksi ?? 0, 0, ',', '.') }}</p>
                    <p>{{ $gunung->deskripsi }}</p>
                </div>
            </div>

            @if($gunung->latitude && $gunung->longitude)
                <div class="card">
                    <div class="card-header">Lokasi di Peta</div>
                    <div class="card-body">
                        <div id="map" style="width:100%;height:400px;border:1px solid #ddd;border-radius:6px;"></div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Info Singkat</h5>
                <p>Gunung: {{ $gunung->nama_gunung }}</p>
                <p>Lokasi: {{ $gunung->lokasi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    @if($gunung->latitude && $gunung->longitude)
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap" async defer></script>
        <script>
            function initMap(){
                var lat = parseFloat('{{ $gunung->latitude }}');
                var lng = parseFloat('{{ $gunung->longitude }}');
                var center = { lat: lat, lng: lng };
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: center,
                    zoom: 12
                });
                new google.maps.Marker({ position: center, map: map, title: '{{ $gunung->nama_gunung }}' });
            }
        </script>
    @endif
@endpush
