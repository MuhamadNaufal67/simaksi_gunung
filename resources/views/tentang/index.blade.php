@extends('layouts.main')

@section('title', 'Tentang SIMAKSI - Sistem Manajemen Pendakian')

@section('content')
<section class="container py-4 py-md-5">
    {{-- Hero --}}
    <div class="card-simaksi overflow-hidden mb-4" style="background:linear-gradient(135deg,#0f4a34 0%,#1e7a52 100%); color:#fff; border:0;">
        <div class="p-4 p-md-5">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <span class="badge bg-light text-dark rounded-pill px-3 py-2 fw-bold"><i class="fa fa-info-circle me-1"></i> Tentang SIMAKSI</span>
                <span class="text-white-50 fw-semibold">Sistem Informasi Manajemen Pendakian Gunung Indonesia</span>
            </div>
            <h1 class="h2 fw-bold mt-3 mb-2">Membuat pendakian lebih tertata dan aman</h1>
            <p class="mb-0 text-white-50" style="max-width:72ch; line-height:1.8;">SIMAKSI membantu pendaki mengakses informasi jalur resmi, panduan keselamatan, dan pengurusan surat izin dengan lebih mudah.</p>
        </div>
    </div>

    <div class="row g-4">
        {{-- Visi & Misi --}}
        <div class="col-12 col-lg-7">
            <div class="card-simaksi p-4 h-100">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fa fa-bullseye" style="color:#15803d;"></i>
                    <h2 class="h4 fw-bold mb-0">Visi & Misi</h2>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="p-3 rounded-4" style="background:rgba(21,128,61,.06); border:1px solid rgba(21,128,61,.18);">
                            <div class="fw-bold mb-2">Visi</div>
                            <p class="text-muted mb-0" style="line-height:1.75;">Meningkatkan akses informasi pendakian resmi agar pendaki dapat membuat keputusan yang lebih aman dan bertanggung jawab.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="p-3 rounded-4" style="background:rgba(21,128,61,.06); border:1px solid rgba(21,128,61,.18);">
                            <div class="fw-bold mb-2">Misi</div>
                            <ul class="text-muted mb-0" style="line-height:1.8; padding-left: 1.1rem;">
                                <li>Memberikan data jalur resmi dan panduan keselamatan.</li>
                                <li>Mempermudah pengurusan surat izin pendakian.</li>
                                <li>Menumbuhkan kesadaran konservasi dan keselamatan.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-color: var(--simaksi-border, rgba(15,23,42,.12));">

                <div class="text-muted" style="line-height:1.8;">
                    <p class="mb-3"><strong>SIMAKSI</strong> (Sistem Informasi Manajemen Pendakian Gunung) adalah platform digital yang dirancang untuk membantu pendaki dalam mengakses informasi jalur resmi, panduan keselamatan, serta pengurusan surat izin pendakian dengan mudah.</p>
                    <p class="mb-3">Dengan adanya SIMAKSI, proses perizinan pendakian menjadi lebih terstruktur, efisien, dan transparan. Pendaki dapat mengetahui informasi gunung, rute pendakian resmi, serta mempelajari panduan penting sebelum mendaki.</p>
                    <p class="mb-0">Website ini juga bertujuan untuk meningkatkan kesadaran pendaki terhadap pentingnya konservasi alam dan keselamatan dalam aktivitas pendakian. Kami bekerja sama dengan taman nasional dan lembaga terkait untuk menyediakan data resmi dan akurat.</p>
                </div>
            </div>
        </div>

        {{-- Timeline --}}
        <div class="col-12 col-lg-5">
            <div class="card-simaksi p-4 h-100">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fa fa-history" style="color:#15803d;"></i>
                    <h2 class="h4 fw-bold mb-0">Timeline</h2>
                </div>

                <div class="d-grid gap-3">
                    <div class="d-flex gap-3">
                        <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:rgba(21,128,61,.10); color:#15803d;">1</div>
                        <div>
                            <div class="fw-bold">Koleksi Data</div>
                            <div class="text-muted" style="line-height:1.7;">Mengumpulkan informasi jalur resmi & detail pendakian.</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:rgba(21,128,61,.10); color:#15803d;">2</div>
                        <div>
                            <div class="fw-bold">Validasi & Integrasi</div>
                            <div class="text-muted" style="line-height:1.7;">Menyatukan data ke dalam alur sistem SIMAKSI.</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="rounded-4 d-flex align-items-center justify-content-center" style="width:44px;height:44px;background:rgba(21,128,61,.10); color:#15803d;">3</div>
                        <div>
                            <div class="fw-bold">Publik & Pemantauan</div>
                            <div class="text-muted" style="line-height:1.7;">Mengoptimalkan pengalaman pengguna dan pembaruan informasi.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Team --}}
    <div class="mt-4 mt-md-5">
        <h2 class="h4 fw-bold mb-3">Tim Pengembang</h2>
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card-simaksi p-4 h-100 text-center">
                    <img src="{{ asset('images/Naufal.jpg') }}" alt="Muhamad Naufal Nazih" class="rounded-circle" style="width:96px;height:96px; object-fit:cover;">
                    <div class="fw-bold mt-3">Muhamad Naufal Nazih</div>
                    <div class="text-muted" style="font-size:.95rem;">Frontend Developer</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card-simaksi p-4 h-100 text-center">
                    <img src="{{ asset('images/arga.png') }}" alt="Muhammad Arga Ashary" class="rounded-circle" style="width:96px;height:96px; object-fit:cover;">
                    <div class="fw-bold mt-3">Muhammad Arga Ashary</div>
                    <div class="text-muted" style="font-size:.95rem;">Backend Developer</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card-simaksi p-4 h-100 text-center">
                    <img src="{{ asset('images/alsel.jpg') }}" alt="Muhamad Alsel Ashrori" class="rounded-circle" style="width:96px;height:96px; object-fit:cover;">
                    <div class="fw-bold mt-3">Muhamad Alsel Ashrori</div>
                    <div class="text-muted" style="font-size:.95rem;">UI/UX Designer</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card-simaksi p-4 h-100 text-center">
                    <img src="{{ asset('images/abid.jpg') }}" alt="Muhammad Syuja Al Abid" class="rounded-circle" style="width:96px;height:96px; object-fit:cover;">
                    <div class="fw-bold mt-3">Muhammad Syuja Al Abid</div>
                    <div class="text-muted" style="font-size:.95rem;">Project Manager</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card-simaksi p-4 h-100 text-center">
                    <img src="{{ asset('images/iben.jpg') }}" alt="Ibnu Agustiana" class="rounded-circle" style="width:96px;height:96px; object-fit:cover;">
                    <div class="fw-bold mt-3">Ibnu Agustiana</div>
                    <div class="text-muted" style="font-size:.95rem;">Content Writer</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card-simaksi p-4 h-100 text-center">
                    <img src="{{ asset('images/fakhrin.jpg') }}" alt="Fakhrin Zharauri Agna" class="rounded-circle" style="width:96px;height:96px; object-fit:cover;">
                    <div class="fw-bold mt-3">Fakhrin Zharauri Agna</div>
                    <div class="text-muted" style="font-size:.95rem;">Quality Assurance</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

