@extends('layouts.main')

@section('title', 'Landing SIMAKSI')

@section('content')
<style>
    /* =========================================================
       LANDING PAGE — premium SaaS polish
       (Linear / Vercel / Stripe / Notion / Airbnb inspired)
       Visual-only. No routes/controllers/logic touched here.
    ========================================================= */

    .landing-section{ padding: 4rem 0; }

    .landing-divider{
        height:1px;
        margin: 0 auto;
        max-width: 100%;
        background: linear-gradient(90deg, transparent, var(--simaksi-border) 20%, var(--simaksi-border) 80%, transparent);
    }

    /* ---------- Hero region (soft gradient + glow) ---------- */
    .landing-hero-region{
        position:relative;
        padding: 2.25rem 1.25rem 2.75rem;
        border-radius: 32px;
        background: linear-gradient(180deg, #ffffff 0%, #f6fbf8 55%, #eef8f1 100%);
        overflow:hidden;
    }
    .landing-hero-glow{
        position:absolute;
        border-radius:50%;
        filter: blur(70px);
        pointer-events:none;
    }
    .landing-hero-glow.g1{ width:340px; height:340px; top:-140px; left:-90px; background: rgba(21,128,61,.16); }
    .landing-hero-glow.g2{ width:300px; height:300px; bottom:-150px; right:-70px; background: rgba(59,130,246,.10); }
    .landing-hero-glow.g3{ width:220px; height:220px; top:35%; right:12%; background: rgba(16,185,129,.13); }

    /* ---------- Hero floating card ---------- */
    .landing-hero-wrap{
        position:relative;
        z-index:1;
        border-radius: 28px;
        padding: 3rem 2.5rem;
        background: #ffffff;
        border: 1px solid rgba(15,23,42,.05);
        box-shadow: 0 25px 60px rgba(0,0,0,.08);
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .landing-hero-wrap:hover{
        transform: translateY(-3px);
        box-shadow: 0 32px 70px rgba(0,0,0,.10);
    }

    .landing-badge{
        display:inline-flex; align-items:center; gap:.4rem;
        background: var(--simaksi-primary-soft);
        color: var(--simaksi-primary);
        border-radius:999px;
        padding:.4rem .85rem;
        font-size:.78rem;
        font-weight:700;
        letter-spacing:.01em;
    }
    .landing-badge .dot{ width:6px; height:6px; border-radius:50%; background:var(--simaksi-primary); display:inline-block; }

    .landing-hero-title{
        font-size: clamp(2rem, 3.6vw, 3rem);
        line-height: 1.12;
        letter-spacing: -0.025em;
        font-weight: 800;
        color: var(--simaksi-text);
        margin: 1.1rem 0 1rem;
    }
    .landing-hero-title .accent{ color: var(--simaksi-primary); }

    .landing-hero-subtitle{
        color: #475569;
        font-size: 1.04rem;
        line-height: 1.75;
        max-width: 44ch;
        margin-bottom: 1.9rem;
    }

    .landing-hero-actions .btn{ padding:.75rem 1.5rem; font-size:.92rem; border-radius:999px; }
    .landing-hero-actions .btn-simaksi-primary{
        box-shadow: 0 10px 24px rgba(21,128,61,.28);
        transition: transform .18s ease, box-shadow .18s ease, filter .18s ease;
    }
    .landing-hero-actions .btn-simaksi-primary:hover{
        transform: translateY(-2px);
        box-shadow: 0 16px 32px rgba(21,128,61,.34);
        filter: brightness(1.02);
    }
    .btn-simaksi-outline{
        background:#fff; border:1px solid var(--simaksi-border); color:var(--simaksi-text); font-weight:700;
        transition: transform .18s ease, border-color .18s ease, color .18s ease;
    }
    .btn-simaksi-outline:hover{ border-color:var(--simaksi-primary); color:var(--simaksi-primary); transform: translateY(-2px); }

    /* ---------- Trust chips (below CTA) ---------- */
    .landing-trust-grid{
        margin-top: 2.15rem;
        display:flex;
        flex-wrap:wrap;
        gap:.6rem .9rem;
    }
    .landing-trust-chip{
        display:flex; align-items:center; gap:.5rem;
        font-size:.85rem; font-weight:600; color:var(--simaksi-text);
        background:#f8fafc; border:1px solid var(--simaksi-border);
        border-radius:999px; padding:.45rem .9rem;
    }
    .landing-trust-chip i{ color:var(--simaksi-primary); font-size:.8rem; }

    /* ---------- Hero visual card (gunung) ---------- */
    .landing-visual-card{
        position:relative;
        border-radius:24px;
        overflow:hidden;
        box-shadow: 0 25px 55px rgba(15,23,42,.16);
        border: 1px solid rgba(15,23,42,.06);
        aspect-ratio: 4 / 5;
        max-height: 460px;
    }
    .landing-visual-card img{
        width:100%; height:100%; object-fit:cover; display:block;
        transition: transform .6s ease;
    }
    .landing-visual-card:hover img{ transform: scale(1.045); }
    .landing-visual-card::after{
        content:"";
        position:absolute; inset:0;
        background: linear-gradient(180deg, rgba(10,20,15,0) 45%, rgba(6,20,14,.55) 100%);
        pointer-events:none;
    }

    .landing-visual-rating{
        position:absolute; top:1rem; left:1rem; z-index:2;
        background:#fff;
        border-radius:14px;
        padding:.55rem .85rem;
        box-shadow: 0 10px 24px rgba(15,23,42,.16);
        line-height:1.3;
    }
    .landing-visual-rating .stars{ color:#f59e0b; font-size:.72rem; letter-spacing:1px; display:block; }
    .landing-visual-rating .label{ font-size:.74rem; font-weight:700; color:var(--simaksi-text); display:block; }

    .landing-visual-caption{
        position:absolute; left:1.1rem; right:1.1rem; bottom:1.1rem;
        z-index:1;
    }
    .landing-visual-chip{
        display:inline-flex; align-items:center; gap:.4rem;
        background: rgba(255,255,255,.94);
        color: var(--simaksi-text);
        border-radius:999px;
        padding:.4rem .8rem;
        font-size:.76rem;
        font-weight:700;
        margin:.2rem .3rem .2rem 0;
        box-shadow: 0 4px 10px rgba(15,23,42,.12);
    }
    .landing-visual-chip i{ color: var(--simaksi-primary); font-size:.72rem; }

    @media (max-width: 991.98px){
        .landing-hero-region{ padding: 1.5rem .9rem 2rem; border-radius:26px; }
        .landing-hero-wrap{ padding: 2rem 1.4rem; border-radius:22px; }
        .landing-hero-title{ font-size: clamp(1.65rem, 6vw, 2.15rem); }
        .landing-visual-card{ max-height: 300px; aspect-ratio: 16/10; margin-top: 1.75rem; }
    }

    /* ---------- Section heading ---------- */
    .landing-eyebrow{ color: var(--simaksi-primary); font-weight:700; font-size:.8rem; letter-spacing:.04em; text-transform:uppercase; }
    .landing-section-title{ font-size: clamp(1.4rem, 2.4vw, 1.9rem); font-weight:800; letter-spacing:-.01em; margin-top:.35rem; }
    .landing-section-sub{ color: var(--simaksi-muted); font-size:.96rem; max-width: 56ch; }

    /* ---------- Stats ---------- */
    .landing-stat-card{
        background: var(--simaksi-card);
        border:1px solid var(--simaksi-border);
        border-radius: 20px;
        padding: 1.8rem 1.4rem;
        text-align:center;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .landing-stat-card:hover{ transform: translateY(-4px); box-shadow: 0 16px 34px rgba(15,23,42,.07); }
    .landing-stat-icon{
        width:52px; height:52px; border-radius:50%;
        display:flex; align-items:center; justify-content:center;
        background: var(--simaksi-primary-soft); color: var(--simaksi-primary);
        font-size:1.05rem; margin: 0 auto .9rem;
    }
    .landing-stat-value{ font-size:1.9rem; font-weight:800; color:var(--simaksi-text); letter-spacing:-.02em; }
    .landing-stat-label{ font-size:.8rem; color:var(--simaksi-muted); font-weight:600; margin-top:.2rem; }

    /* ---------- Feature card ---------- */
    .landing-feature-card{
        background:#fff;
        border:1px solid var(--simaksi-border);
        border-radius: 20px;
        padding: 2rem 1.75rem;
        height:100%;
        box-shadow: 0 1px 2px rgba(16,24,20,.03);
        transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
    }
    .landing-feature-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 20px 42px rgba(15,23,42,.09);
        border-color: rgba(15,23,42,.04);
    }
    .landing-feature-icon{
        width:56px; height:56px; border-radius:16px;
        display:flex; align-items:center; justify-content:center;
        background: var(--simaksi-primary-soft); color: var(--simaksi-primary);
        font-size:1.35rem; margin-bottom: 1.15rem;
    }
    .landing-feature-title{ font-weight:800; font-size:1.05rem; margin-bottom:.4rem; color:var(--simaksi-text); }
    .landing-feature-desc{ color: var(--simaksi-muted); font-size:.92rem; line-height:1.7; margin-bottom:0; }

    /* ---------- Gunung populer ---------- */
    .landing-gunung-card{
        border-radius:20px; overflow:hidden; display:block; text-decoration:none; color:inherit; height:100%;
        border:1px solid var(--simaksi-border);
        background:#fff;
        box-shadow: 0 1px 2px rgba(16,24,20,.03);
        transition: transform .22s ease, box-shadow .22s ease;
    }
    .landing-gunung-card:hover{ transform: translateY(-5px); box-shadow: 0 18px 36px rgba(15,23,42,.09); }
    .landing-gunung-img-wrap{ overflow:hidden; height:170px; }
    .landing-gunung-img{ height:170px; width:100%; object-fit:cover; display:block; transition: transform .5s ease; }
    .landing-gunung-card:hover .landing-gunung-img{ transform: scale(1.06); }
    .landing-gunung-body{ padding:1rem 1.1rem 1.2rem; }
    .landing-gunung-name{ font-weight:700; color:var(--simaksi-text); margin-bottom:.15rem; }
    .landing-gunung-meta{ font-size:.8rem; color:var(--simaksi-muted); font-weight:600; }

    /* ---------- Cara mendaftar ---------- */
    .landing-step-card{
        position:relative; padding: 1.9rem 1.6rem 1.75rem;
        background:#fff; border:1px solid var(--simaksi-border); border-radius:20px; height:100%;
        transition: transform .22s ease, box-shadow .22s ease;
    }
    .landing-step-card:hover{ transform: translateY(-5px); box-shadow: 0 16px 32px rgba(15,23,42,.07); }
    .landing-step-num{
        width:36px; height:36px; border-radius:12px;
        background: var(--simaksi-primary); color:#fff;
        display:flex; align-items:center; justify-content:center;
        font-weight:800; font-size:.95rem;
        margin-bottom: 1rem;
    }

    /* ---------- FAQ ---------- */
    .landing-faq .accordion-item{ border:1px solid var(--simaksi-border); border-radius:16px !important; overflow:hidden; margin-bottom:.75rem; }
    .landing-faq .accordion-button{ font-weight:700; font-size:.95rem; padding:1.1rem 1.3rem; color: var(--simaksi-text); }
    .landing-faq .accordion-button:not(.collapsed){ background: var(--simaksi-primary-soft); color: var(--simaksi-primary); box-shadow:none; }
    .landing-faq .accordion-button:focus{ box-shadow:none; }
    .landing-faq .accordion-body{ padding: 0 1.3rem 1.2rem; color: var(--simaksi-muted); font-size:.9rem; line-height:1.7; }

    /* ---------- CTA footer band ---------- */
    .landing-cta{
        border-radius: 26px;
        padding: 2.75rem 2rem;
        text-align:center;
        background: linear-gradient(135deg, var(--simaksi-primary) 0%, #0a3322 100%);
        color:#fff;
    }
    .landing-cta h2{ font-weight:800; font-size: clamp(1.4rem, 2.6vw, 2rem); margin-bottom:.6rem; }
    .landing-cta p{ color: rgba(255,255,255,.82); max-width: 52ch; margin: 0 auto 1.6rem; }
    .landing-cta .btn-light{
        font-weight:700; border-radius:999px; padding:.75rem 1.6rem; color:#166534;
        transition: transform .18s ease, box-shadow .18s ease;
    }
    .landing-cta .btn-light:hover{ transform: translateY(-2px); box-shadow: 0 14px 28px rgba(0,0,0,.18); }

    /* ---------- Landing footer (page-scoped) ---------- */
    .landing-footer-card{
        background:#f8fafc;
        border:1px solid var(--simaksi-border);
        border-radius: 24px;
        padding: 2.5rem 2rem 1.5rem;
    }
    .landing-footer-brand{
        display:flex; align-items:center; gap:.55rem;
        font-weight:800; font-size:1.1rem; color:var(--simaksi-text); margin-bottom:.7rem;
    }
    .landing-footer-brand i{ color: var(--simaksi-primary); }
    .landing-footer-desc{ color: var(--simaksi-muted); font-size:.88rem; line-height:1.7; max-width: 32ch; }
    .landing-footer-heading{
        font-weight:700; font-size:.78rem; text-transform:uppercase; letter-spacing:.05em;
        color: var(--simaksi-text); margin-bottom:.9rem;
    }
    .landing-footer-links{ list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:.6rem; }
    .landing-footer-links a{ color: var(--simaksi-muted); text-decoration:none; font-size:.88rem; font-weight:600; transition: color .15s ease; }
    .landing-footer-links a:hover{ color: var(--simaksi-primary); }
    .landing-footer-bottom{
        border-top:1px solid var(--simaksi-border);
        margin-top: 2.1rem; padding-top: 1.25rem;
        text-align:center; font-size:.8rem; color: var(--simaksi-muted);
    }
</style>

<section class="landing-hero-region">
    <span class="landing-hero-glow g1"></span>
    <span class="landing-hero-glow g2"></span>
    <span class="landing-hero-glow g3"></span>

    <div class="landing-hero-wrap">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-12 col-lg-6">
                <span class="landing-badge"><span class="dot"></span> SIMAKSI Gunung</span>

                <h1 class="landing-hero-title">
                    Kelola perizinan pendakian Anda <span class="accent">lebih rapi dan terpercaya</span>
                </h1>

                <p class="landing-hero-subtitle">
                    Temukan gunung populer, pilih rute resmi, dan selesaikan SIMAKSI dalam satu platform yang ringkas, modern, dan mudah dipantau statusnya.
                </p>

                <div class="d-flex flex-column flex-sm-row gap-2 gap-sm-3 landing-hero-actions">
                    <a href="{{ route('register') }}" class="btn btn-simaksi-primary fw-bold">
                        <i class="fa fa-file-signature me-2"></i> Daftar Sekarang
                    </a>
                    <a href="{{ route('gunung.index') }}" class="btn btn-simaksi-outline fw-bold">
                        <i class="fa fa-mountain me-2"></i> Jelajahi Gunung
                    </a>
                </div>

                <div class="landing-trust-grid">
                    <div class="landing-trust-chip"><i class="fa fa-circle-check"></i> Rute Resmi</div>
                    <div class="landing-trust-chip"><i class="fa fa-circle-check"></i> Data Terintegrasi</div>
                    <div class="landing-trust-chip"><i class="fa fa-circle-check"></i> Proses Cepat</div>
                    <div class="landing-trust-chip"><i class="fa fa-circle-check"></i> Aman</div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="landing-visual-card">
                    <div class="landing-visual-rating">
                        <span class="stars">★★★★★</span>
                        <span class="label">Gunung Populer</span>
                    </div>
                    <img src="{{ asset('images/gunung/Gunung_semeru.jpg') }}" alt="Gunung Semeru">
                    <div class="landing-visual-caption">
                        <span class="landing-visual-chip"><i class="fa fa-route"></i> Rute Resmi</span>
                        <span class="landing-visual-chip"><i class="fa fa-circle-check"></i> SIMAKSI Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-section pt-0">
    <div class="row g-3">
        <div class="col-6 col-lg-3">
            <div class="landing-stat-card">
                <div class="landing-stat-icon"><i class="fa fa-mountain"></i></div>
                <div class="landing-stat-value">15+</div>
                <div class="landing-stat-label">Gunung Terdaftar</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="landing-stat-card">
                <div class="landing-stat-icon"><i class="fa fa-route"></i></div>
                <div class="landing-stat-value">100%</div>
                <div class="landing-stat-label">Rute Resmi</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="landing-stat-card">
                <div class="landing-stat-icon"><i class="fa fa-signal"></i></div>
                <div class="landing-stat-value">24/7</div>
                <div class="landing-stat-label">Pantau Status</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="landing-stat-card">
                <div class="landing-stat-icon"><i class="fa fa-layer-group"></i></div>
                <div class="landing-stat-value">1</div>
                <div class="landing-stat-label">Platform Terpadu</div>
            </div>
        </div>
    </div>
</section>

<div class="container"><div class="landing-divider"></div></div>

<section class="landing-section">
    <div class="landing-eyebrow">Kenapa SIMAKSI</div>
    <div class="landing-section-title mb-2">Dirancang agar proses pendakian lebih tertata</div>
    <p class="landing-section-sub mb-4">Fokus pada kejelasan informasi dan alur yang ringkas, dari pendaftaran hingga hari pendakian.</p>

    <div class="row g-3">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="landing-feature-card">
                <div class="landing-feature-icon"><i class="fa fa-check-circle"></i></div>
                <div class="landing-feature-title">Pendaftaran Mudah</div>
                <p class="landing-feature-desc">Form terstruktur untuk mempercepat proses dan mengurangi kesalahan input.</p>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="landing-feature-card">
                <div class="landing-feature-icon"><i class="fa fa-lock"></i></div>
                <div class="landing-feature-title">Aman &amp; Terpercaya</div>
                <p class="landing-feature-desc">Status dipantau dari dashboard, sehingga Anda selalu tahu progresnya.</p>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="landing-feature-card">
                <div class="landing-feature-icon"><i class="fa fa-compass"></i></div>
                <div class="landing-feature-title">Panduan Lengkap</div>
                <p class="landing-feature-desc">Panduan keselamatan dan alur pendakian yang praktis sebelum berangkat.</p>
            </div>
        </div>
    </div>
</section>

<div class="container"><div class="landing-divider"></div></div>

<section class="landing-section">
    <div class="d-flex align-items-end justify-content-between flex-wrap gap-2 mb-4">
        <div>
            <div class="landing-eyebrow">Destinasi</div>
            <div class="landing-section-title">Gunung Populer</div>
        </div>
        <a href="{{ route('gunung.index') }}" class="text-decoration-none fw-bold" style="color: var(--simaksi-primary); font-size:.9rem;">
            Lihat semua gunung <i class="fa fa-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="row g-3">
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="{{ route('gunung.index') }}" class="landing-gunung-card">
                <div class="landing-gunung-img-wrap">
                    <img src="{{ asset('images/gunung/GunungRinjani.jpg') }}" alt="Gunung Rinjani" class="landing-gunung-img">
                </div>
                <div class="landing-gunung-body">
                    <div class="landing-gunung-name">Gunung Rinjani</div>
                    <div class="landing-gunung-meta">Nusa Tenggara Barat</div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="{{ route('gunung.index') }}" class="landing-gunung-card">
                <div class="landing-gunung-img-wrap">
                    <img src="{{ asset('images/gunung/GunungBromo.jpg') }}" alt="Gunung Bromo" class="landing-gunung-img">
                </div>
                <div class="landing-gunung-body">
                    <div class="landing-gunung-name">Gunung Bromo</div>
                    <div class="landing-gunung-meta">Jawa Timur</div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="{{ route('gunung.index') }}" class="landing-gunung-card">
                <div class="landing-gunung-img-wrap">
                    <img src="{{ asset('images/gunung/GunungMerbabu.jpg') }}" alt="Gunung Merbabu" class="landing-gunung-img">
                </div>
                <div class="landing-gunung-body">
                    <div class="landing-gunung-name">Gunung Merbabu</div>
                    <div class="landing-gunung-meta">Jawa Tengah</div>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="{{ route('gunung.index') }}" class="landing-gunung-card">
                <div class="landing-gunung-img-wrap">
                    <img src="{{ asset('images/gunung/Gunung_Kerinci.png') }}" alt="Gunung Kerinci" class="landing-gunung-img">
                </div>
                <div class="landing-gunung-body">
                    <div class="landing-gunung-name">Gunung Kerinci</div>
                    <div class="landing-gunung-meta">Jambi</div>
                </div>
            </a>
        </div>
    </div>
</section>

<div class="container"><div class="landing-divider"></div></div>

<section class="landing-section">
    <div class="landing-eyebrow">Alur</div>
    <div class="landing-section-title mb-4">Cara Mendaftar</div>

    <div class="row g-3">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="landing-step-card">
                <div class="landing-step-num">1</div>
                <div class="fw-bold mb-1">Pilih Gunung</div>
                <p class="text-muted mb-0" style="line-height:1.7;">Jelajahi daftar gunung dan pilih tujuan pendakian Anda.</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="landing-step-card">
                <div class="landing-step-num">2</div>
                <div class="fw-bold mb-1">Pilih Rute</div>
                <p class="text-muted mb-0" style="line-height:1.7;">Lihat detail rute resmi yang tersedia untuk gunung tersebut.</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="landing-step-card">
                <div class="landing-step-num">3</div>
                <div class="fw-bold mb-1">Isi SIMAKSI</div>
                <p class="text-muted mb-0" style="line-height:1.7;">Lengkapi formulir pendaftaran dan data identitas dengan mudah.</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="landing-step-card">
                <div class="landing-step-num">4</div>
                <div class="fw-bold mb-1">Pantau Status</div>
                <p class="text-muted mb-0" style="line-height:1.7;">Cek status pendaftaran langsung dari dashboard Anda.</p>
            </div>
        </div>
    </div>
</section>

<div class="container"><div class="landing-divider"></div></div>

<section class="landing-section">
    <div class="landing-eyebrow">Bantuan</div>
    <div class="landing-section-title mb-4">Pertanyaan yang Sering Diajukan</div>

    <div class="accordion landing-faq" id="landingFaqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqSatu">
                    Apa itu SIMAKSI?
                </button>
            </h2>
            <div id="faqSatu" class="accordion-collapse collapse show" data-bs-parent="#landingFaqAccordion">
                <div class="accordion-body">
                    SIMAKSI adalah platform untuk mengelola perizinan pendakian gunung secara digital, mulai dari pemilihan gunung dan rute hingga pemantauan status pendaftaran.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqDua">
                    Bagaimana cara mendaftar pendakian?
                </button>
            </h2>
            <div id="faqDua" class="accordion-collapse collapse" data-bs-parent="#landingFaqAccordion">
                <div class="accordion-body">
                    Buat akun terlebih dahulu, lalu pilih gunung dan rute yang tersedia, kemudian lengkapi formulir SIMAKSI melalui dashboard Anda.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTiga">
                    Apakah saya bisa memantau status pendaftaran?
                </button>
            </h2>
            <div id="faqTiga" class="accordion-collapse collapse" data-bs-parent="#landingFaqAccordion">
                <div class="accordion-body">
                    Bisa. Setiap status pendaftaran dapat dipantau secara real-time melalui dashboard setelah Anda login.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqEmpat">
                    Apakah rute yang ditampilkan resmi?
                </button>
            </h2>
            <div id="faqEmpat" class="accordion-collapse collapse" data-bs-parent="#landingFaqAccordion">
                <div class="accordion-body">
                    Ya, seluruh rute yang ditampilkan merupakan rute resmi yang dikurasi untuk masing-masing gunung.
                </div>
            </div>
        </div>
    </div>
</section>

<section class="landing-section pt-0">
    <div class="landing-cta">
        <h2>Siap memulai pendakian Anda?</h2>
        <p>Daftarkan diri Anda sekarang dan nikmati proses SIMAKSI yang lebih rapi, jelas, dan mudah dipantau.</p>
        <a href="{{ route('register') }}" class="btn btn-light">
            <i class="fa fa-file-signature me-2"></i> Daftar Sekarang
        </a>
    </div>
</section>

<section class="landing-section pt-0">
    <div class="landing-footer-card">
        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <div class="landing-footer-brand"><i class="fa fa-mountain-sun"></i> SIMAKSI.COM</div>
                <p class="landing-footer-desc">Platform pengelolaan perizinan pendakian gunung yang modern, rapi, dan mudah dipantau.</p>
            </div>
            <div class="col-6 col-lg-2">
                <div class="landing-footer-heading">Tentang</div>
                <ul class="landing-footer-links">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="{{ route('gunung.index') }}">Daftar Gunung</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <div class="landing-footer-heading">Panduan</div>
                <ul class="landing-footer-links">
                    <li><a href="#">Cara Mendaftar</a></li>
                    <li><a href="#">Keselamatan</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <div class="landing-footer-heading">Kontak</div>
                <ul class="landing-footer-links">
                    <li><a href="mailto:info@simaksi.com">info@simaksi.com</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2">
                <div class="landing-footer-heading">GitHub</div>
                <ul class="landing-footer-links">
                    <li><a href="https://github.com/MuhamadNaufal67" target="_blank" rel="noopener"><i class="fa-brands fa-github me-1"></i> Repository</a></li>
                </ul>
            </div>
        </div>
        <div class="landing-footer-bottom">
            &copy; {{ date('Y') }} SIMAKSI.COM — Seluruh hak cipta dilindungi.
        </div>
    </div>
</section>
@endsection
