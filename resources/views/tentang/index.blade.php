@extends('layouts.main')

@section('title', 'Tentang SIMAKSI - Sistem Manajemen Pendakian')

@section('content')
<style>
    .tentang-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 60px 20px;
        text-align: center;
        color: #333;
    }

    h1 {
        color: #104734;
        font-size: 2.3rem;
        margin-bottom: 20px;
    }

    p.subtext {
        color: #4a7c59;
        font-size: 1.1rem;
        margin-bottom: 40px;
    }

    .tentang-content {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        line-height: 1.8;
        text-align: justify;
    }

    .team-section {
        margin-top: 60px;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .team-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .team-card img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
        object-fit: cover;
    }

    .team-card h4 {
        margin: 5px 0;
        color: #104734;
    }

    .team-card p {
        font-size: 0.9rem;
        color: #666;
    }
</style>

<div class="tentang-container">
    <h1>ℹ️ Tentang SIMAKSI</h1>
    <p class="subtext">Sistem Informasi Manajemen Pendakian Gunung Indonesia</p>

    <div class="tentang-content">
        <p><strong>SIMAKSI</strong> (Sistem Informasi Manajemen Pendakian Gunung) adalah platform digital yang dirancang untuk membantu pendaki gunung di Indonesia dalam mengakses informasi jalur resmi, panduan keselamatan, serta pengurusan surat izin pendakian dengan mudah.</p>

        <p>Dengan adanya SIMAKSI, proses perizinan pendakian menjadi lebih terstruktur, efisien, dan transparan. Pendaki dapat mengetahui informasi gunung, rute pendakian resmi, serta mempelajari panduan penting sebelum mendaki.</p>

        <p>Website ini juga bertujuan untuk meningkatkan kesadaran pendaki terhadap pentingnya konservasi alam dan keselamatan dalam aktivitas pendakian. Kami bekerja sama dengan taman nasional dan lembaga terkait untuk menyediakan data resmi dan akurat.</p>
    </div>

    <div class="team-section">
        <h2>Tim Pengembang</h2>
        <div class="team-grid">
            <div class="team-card">
                <img src="{{ asset('images/Naufal.jpg') }}" alt="Tim 1">
                <h4>Muhamad Naufal Nazih</h4>
                <p>Frontend Developer</p>
            </div>
            <div class="team-card">
                <img src="{{ asset('images/arga.png') }}" alt="Tim 2">
                <h4>Muhammad Arga Ashary</h4>
                <p>Backend Developer</p>
            </div>
            <div class="team-card">
                <img src="{{ asset('images/alsel.jpg') }}" alt="Tim 3">
                <h4>Muhamad Alsel Ashrori</h4>
                <p>UI/UX Designer</p>
            </div>
            <div class="team-card">
                <img src="{{ asset('images/abid.jpg') }}" alt="Tim 4">
                <h4>Muhammad Syuja Al Abid</h4>
                <p>Project Manager</p>
            </div>
            <div class="team-card">
                <img src="{{ asset('images/iben.jpg') }}" alt="Tim 5">
                <h4>Ibnu Agustiana</h4>
                <p>Content Writer</p>
            </div>
            <div class="team-card">
                <img src="{{ asset('images/fakhrin.jpg') }}" alt="Tim 6">
                <h4>Fakhrin Zharauri Agna</h4>
                <p>Quality Assurance</p>
        </div>
    </div>
</div>
@endsection
