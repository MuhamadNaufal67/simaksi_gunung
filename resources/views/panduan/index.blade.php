@extends('layouts.main')

@section('title', 'Panduan Pendakian - SIMAKSI')

@section('content')
<style>
    .panduan-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 60px 20px;
        color: #333;
    }

    h1 {
        color: #104734;
        font-size: 2.3rem;
        margin-bottom: 20px;
        text-align: center;
    }

    p.subtext {
        color: #4a7c59;
        text-align: center;
        margin-bottom: 50px;
        font-size: 1.05rem;
    }

    .step {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        display: flex;
        align-items: flex-start;
        gap: 20px;
        transition: 0.3s;
    }

    .step:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(16,71,52,0.15);
    }

    .step-icon {
        background: #28a745;
        color: white;
        font-size: 1.5rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(40,167,69,0.3);
    }

    .step-content h3 {
        margin-bottom: 8px;
        color: #104734;
    }

    .step-content p {
        color: #555;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .step {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .step-icon {
            margin-bottom: 10px;
        }
    }
</style>

<div class="panduan-container">
    <h1>🧭 Panduan Pendakian Gunung</h1>
    <p class="subtext">Ikuti langkah-langkah berikut agar pendakianmu aman, nyaman, dan sesuai prosedur resmi.</p>

    <div class="step">
        <div class="step-icon">📝</div>
        <div class="step-content">
            <h3>1. Persiapan Administrasi</h3>
            <p>Lengkapi identitas diri, surat izin pendakian (SIMAKSI), serta dokumen pendukung seperti surat keterangan sehat dari puskesmas atau dokter. Semua dokumen ini wajib sebelum memulai pendakian.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-icon">🎒</div>
        <div class="step-content">
            <h3>2. Persiapan Peralatan</h3>
            <p>Bawa perlengkapan sesuai kebutuhan: tenda, matras, sleeping bag, pakaian hangat, jas hujan, obat pribadi, dan peralatan masak. Jika perlu, pinjam alat pendakian melalui sistem peminjaman alat yang tersedia di web ini. Hindari membawa barang berlebihan yang tidak diperlukan.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-icon">🚶</div>
        <div class="step-content">
            <h3>3. Mengikuti Jalur Resmi</h3>
            <p>Gunakan jalur pendakian resmi yang sudah ditetapkan oleh pengelola taman nasional. Hindari jalur ilegal untuk menjaga keselamatan dan kelestarian alam sekitar.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-icon">🔥</div>
        <div class="step-content">
            <h3>4. Jaga Kebersihan & Alam</h3>
            <p>Bawa kembali semua sampah. Jangan meninggalkan jejak, termasuk sisa makanan, plastik, dan benda berbahaya lainnya. Ingat, pendaki bertanggung jawab menjaga keindahan alam.</p>
        </div>
    </div>

    <div class="step">
        <div class="step-icon">🏕️</div>
        <div class="step-content">
            <h3>5. Lapor Sebelum & Sesudah Pendakian</h3>
            <p>Lapor ke pos pendakian saat naik dan turun gunung. Petugas akan mencatat data pendaki untuk keamanan dan pemantauan cuaca atau kondisi gunung. Jika meminjam alat, pastikan untuk mengkonfirmasi peminjaman di pos sebelum masuk kawasan konservasi.</p>
        </div>
    </div>
</div>
@endsection
