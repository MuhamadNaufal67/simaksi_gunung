@extends('layouts.main')

@section('title', 'Panduan Pendakian - SIMAKSI')

@section('content')
<section class="container py-4 py-md-5">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-2">🧭 Panduan Pendakian Gunung</h1>
            <p class="text-muted mb-0">Ikuti langkah-langkah berikut agar pendakianmu aman, nyaman, dan sesuai prosedur resmi.</p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">
            <div class="card-simaksi p-4 h-100 hover-simaksi">
                <div class="d-flex gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:46px;height:46px;background:rgba(67,160,71,.12); color:#15803d;">
                        <i class="fa fa-clipboard-check"></i>
                    </div>
                    <div>
                        <h2 class="h5 fw-bold mb-2">1. Persiapan Administrasi</h2>
                        <p class="text-muted mb-0" style="line-height:1.75;">Lengkapi identitas diri, surat izin pendakian (SIMAKSI), serta dokumen pendukung seperti surat keterangan sehat dari puskesmas atau dokter. Semua dokumen ini wajib sebelum memulai pendakian.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card-simaksi p-4 h-100">
                <div class="d-flex gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:46px;height:46px;background:rgba(67,160,71,.12); color:#15803d;">
                        <i class="fa fa-suitcase-rolling"></i>
                    </div>
                    <div>
                        <h2 class="h5 fw-bold mb-2">2. Persiapan Peralatan</h2>
                        <p class="text-muted mb-0" style="line-height:1.75;">Bawa perlengkapan sesuai kebutuhan: tenda, matras, sleeping bag, pakaian hangat, jas hujan, obat pribadi, dan peralatan masak. Jika perlu, pinjam alat pendakian melalui sistem peminjaman alat yang tersedia di web ini. Hindari membawa barang berlebihan yang tidak diperlukan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card-simaksi p-4 h-100">
                <div class="d-flex gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:46px;height:46px;background:rgba(67,160,71,.12); color:#15803d;">
                        <i class="fa fa-route"></i>
                    </div>
                    <div>
                        <h2 class="h5 fw-bold mb-2">3. Mengikuti Jalur Resmi</h2>
                        <p class="text-muted mb-0" style="line-height:1.75;">Gunakan jalur pendakian resmi yang sudah ditetapkan oleh pengelola taman nasional. Hindari jalur ilegal untuk menjaga keselamatan dan kelestarian alam sekitar.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card-simaksi p-4 h-100">
                <div class="d-flex gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:46px;height:46px;background:rgba(67,160,71,.12); color:#15803d;">
                        <i class="fa fa-leaf"></i>
                    </div>
                    <div>
                        <h2 class="h5 fw-bold mb-2">4. Jaga Kebersihan & Alam</h2>
                        <p class="text-muted mb-0" style="line-height:1.75;">Bawa kembali semua sampah. Jangan meninggalkan jejak, termasuk sisa makanan, plastik, dan benda berbahaya lainnya. Ingat, pendaki bertanggung jawab menjaga keindahan alam.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card-simaksi p-4 h-100">
                <div class="d-flex gap-3">
                    <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:46px;height:46px;background:rgba(67,160,71,.12); color:#15803d;">
                        <i class="fa fa-flag"></i>
                    </div>
                    <div>
                        <h2 class="h5 fw-bold mb-2">5. Lapor Sebelum & Sesudah Pendakian</h2>
                        <p class="text-muted mb-0" style="line-height:1.75;">Lapor ke pos pendakian saat naik dan turun gunung. Petugas akan mencatat data pendaki untuk keamanan dan pemantauan cuaca atau kondisi gunung. Jika meminjam alat, pastikan untuk mengkonfirmasi peminjaman di pos sebelum masuk kawasan konservasi.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

