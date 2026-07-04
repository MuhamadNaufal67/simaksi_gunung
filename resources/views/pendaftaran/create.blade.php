@extends('layouts.main')

@section('title', 'Tambah Pendaftaran SIMAKSI')

@section('content')
<style>
    :root {
        --primary-green: #104734;
        --secondary-green: #228B22;
        --success-green: #28a745;
        --light-green: #e8f5e9;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
        --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
        --shadow-lg: 0 8px 24px rgba(0,0,0,0.12);
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
    }

    .page-wrapper {
        background: linear-gradient(to bottom, #f8fffe 0%, #ffffff 100%);
        min-height: 100vh;
        padding: 24px 0 48px;
    }

    /* Header */
    .page-header {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
        padding: 32px 0;
        margin-bottom: 32px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        text-align: center;
    }

    .page-title {
        color: white;
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0 0 16px 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .btn-back {
        background: white;
        color: var(--primary-green);
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        color: var(--primary-green);
    }

    /* Form Container */
    .form-card {
        background: white;
        padding: 40px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        max-width: 950px;
        margin: 0 auto;
        border-top: 4px solid var(--success-green);
    }

    /* Section Headers */
    .section-header {
        color: var(--primary-green);
        font-size: 1.125rem;
        font-weight: 700;
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--light-green);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Form Elements */
    label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
        display: block;
        font-size: 0.9rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="file"],
    select {
        border: 2px solid #e0e0e0;
        border-radius: var(--radius-sm);
        padding: 12px 16px;
        width: 100%;
        font-size: 0.95rem;
        transition: all 0.2s ease;
        background: white;
    }

    input:focus,
    select:focus {
        border-color: var(--success-green);
        outline: none;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
    }

    input:disabled,
    input[readonly] {
        background: #f5f5f5;
        cursor: not-allowed;
    }

    .form-control,
    .form-select {
        border: 2px solid #e0e0e0;
        border-radius: var(--radius-sm);
        padding: 12px 16px;
        font-size: 0.95rem;
    }

    /* Member Item */
    .anggota-item {
        background: #f8fffe;
        border: 2px solid var(--light-green);
        border-radius: var(--radius-md);
        padding: 24px;
        margin-bottom: 20px;
        transition: all 0.2s ease;
    }

    .anggota-item:hover {
        box-shadow: var(--shadow-sm);
    }

    .anggota-item h6 {
        color: var(--success-green);
        font-weight: 700;
        margin-bottom: 20px;
        font-size: 1rem;
    }

    /* Buttons */
    .btn-submit {
        background: linear-gradient(135deg, var(--success-green) 0%, #20c997 100%);
        border: none;
        padding: 14px 32px;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        transition: all 0.2s ease;
        font-size: 1rem;
        cursor: pointer;
    }

    .btn-submit:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
    }

    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .btn-cancel {
        background: #e0e0e0;
        color: #333;
        border-radius: 8px;
        padding: 14px 32px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-left: 12px;
        display: inline-block;
    }

    .btn-cancel:hover {
        background: #d0d0d0;
        color: #000;
    }

    /* Spacing */
    .mb-3 {
        margin-bottom: 20px;
    }

    .mt-4 {
        margin-top: 32px;
    }

    /* Modal Styling */
    .modal-content {
        border: none;
        border-radius: var(--radius-lg);
        overflow: hidden;
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 100%);
        color: white;
        border: none;
        padding: 20px 24px;
    }

    .modal-title {
        font-weight: 700;
        font-size: 1.25rem;
    }

    .modal-body {
        padding: 32px 24px;
    }

    .modal-body p {
        margin-bottom: 12px;
        font-size: 0.95rem;
    }

    .modal-body hr {
        margin: 20px 0;
        border-color: var(--light-green);
    }

    .btn-success {
        background: var(--success-green);
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-success:hover {
        background: #218838;
        transform: translateY(-2px);
    }

    .btn-outline-success {
        border: 2px solid var(--success-green);
        color: var(--success-green);
        background: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .btn-outline-success:hover {
        background: var(--success-green);
        color: white;
    }

    /* Modal Backdrop */
    .modal-backdrop.show {
        backdrop-filter: blur(6px);
        background-color: rgba(0, 0, 0, 0.3);
    }

    .modal.fade .modal-dialog {
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.4s ease-in-out;
    }

    .modal.show .modal-dialog {
        transform: translateY(0);
        opacity: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-card {
            padding: 24px;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .section-header {
            font-size: 1rem;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
            margin: 8px 0;
        }
    }
</style>

<div class="page-wrapper">
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h1 class="page-title">📝 Tambah Pendaftaran SIMAKSI</h1>
            <a href="{{ route('pendaftaran.index') }}" class="btn-back">← Kembali</a>
        </div>

        <!-- Form -->
        <div class="form-card">
            <form id="formPendaftaran" enctype="multipart/form-data">
                @csrf

                <!-- Data Pendakian -->
                <h5 class="section-header">🏔️ Data Pendakian</h5>
                
                {{-- Jika user datang dari tombol "Daftar SIMAKSI" (rute spesifik) --}}
                @if(isset($gunung) && isset($rute))
                  <div class="mb-3">
                    <label for="gunung_id">Gunung Tujuan</label>
                    <input type="text" class="form-control" value="{{ $gunung->nama_gunung }}" readonly>
                    <input type="hidden" name="gunung_id" value="{{ $gunung->id_gunung }}">
                  </div>

                  <div class="mb-3">
                    <label for="rute_pendakian_id">Rute Pendakian</label>
                    <input type="text" class="form-control" value="{{ $rute->nama_rute }}" readonly>
                    <input type="hidden" name="rute_pendakian_id" value="{{ $rute->id_rute }}">
                    {{-- 🔥 PENTING: Simpan harga di hidden input --}}
                    <input type="hidden" id="harga_raw" value="{{ $rute->harga }}">
                  </div>

                @else
                {{-- Kalau buka dari menu biasa, user pilih manual --}}
                  <div class="mb-3">
                    <label for="gunung_id">Gunung Tujuan</label>
                      <select name="gunung_id" id="gunung_id" required>
                        <option value="">-- Pilih Gunung --</option>
                @foreach($gunungs as $g)
                  <option value="{{ $g->id_gunung }}">{{ $g->nama_gunung }}</option>
                @endforeach
                      </select>
                  </div>

                <div class="mb-3">
                  <label for="rute_pendakian_id">Rute Pendakian</label>
                    <select name="rute_pendakian_id" id="rute_pendakian_id" required>
                      <option value="">-- Pilih Rute --</option>
                    </select>
                </div>
                @endif

                

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_pendakian">Tanggal Naik</label>
                        <input type="date" name="tanggal_pendakian" id="tanggal_pendakian" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_turun">Tanggal Turun</label>
                        <input type="date" name="tanggal_turun" id="tanggal_turun" required>
                    </div>
                </div>

                <!-- Identitas Utama -->
                <h5 class="section-header">👤 Identitas Pendaki Utama</h5>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Jenis Identitas</label>
                        <select name="jenis_identitas" required>
                            <option value="">-- Pilih Jenis Identitas --</option>
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
                            <option value="KK">KK</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nomor Identitas</label>
                        <input type="text" name="no_identitas" placeholder="Masukkan Nomor Identitas" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Upload Foto Identitas (KTP/SIM/KK)</label>
                    <input type="file" name="foto_identitas" accept="image/*" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Jenis Kelamin Pendaki Utama</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Usia Pendaki Utama</label>
                        <input type="number" name="usia" class="form-control" min="10" required>
                    </div>
                </div>

                <!-- Biaya Pendakian -->
                <h5 class="section-header">💰 Biaya Pendakian</h5>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Jumlah Pendaki</label>
                        <input type="number" name="jumlah_pendaki" id="jumlah_pendaki" min="1" value="1" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Harga per Pendaki (Rp)</label>
                        <input type="text" id="harga" readonly
                               @if(isset($rute)) value="{{ number_format($rute->harga, 0, ',', '.') }}" @endif>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Total Biaya (Rp)</label>
                        <input type="text" id="total_biaya" readonly
                               @if(isset($rute)) value="{{ number_format($rute->harga, 0, ',', '.') }}" @endif>
                    </div>
                </div>

                <!-- Peminjaman Alat -->
                <h5 class="section-header">🛠️ Peminjaman Alat Pendakian</h5>
                <div id="alatContainer" class="mb-3">
                    <p class="text-muted">Memuat daftar alat...</p>
                </div>

                <!-- Total Biaya Peminjaman -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="alert alert-info">
                            <strong>Total Biaya Peminjaman Alat: Rp<span id="totalBiayaAlat">0</span></strong>
                        </div>
                    </div>
                </div>

                <!-- Total Biaya Keseluruhan -->
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="alert alert-success">
                            <h6><strong>💳 Total Pembayaran Keseluruhan: Rp<span id="totalBiayaKeseluruhan">0</span></strong></h6>
                            <small class="text-muted">(Biaya SIMAKSI + Biaya Peminjaman Alat)</small>
                        </div>
                    </div>
                </div>

                <!-- Anggota Lain -->
                <div id="anggotaContainer" style="display:none;">
                    <h5 class="section-header">👥 Anggota Pendakian</h5>
                    <div id="anggotaList"></div>
                </div>

                <!-- Tombol Submit -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn-submit">💾 Simpan & Bayar Sekarang</button>
                    <a href="{{ route('pendaftaran.index') }}" class="btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Pembayaran -->
<div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none;">
            <!-- Header dengan Gradient -->
            <div class="modal-header" style="background: linear-gradient(135deg, #104734 0%, #228B22 100%); border: none; padding: 24px 32px;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="font-size: 2rem;">💳</span>
                    <h5 class="modal-title" id="modalPembayaranLabel" style="color: white; font-weight: 700; margin: 0; font-size: 1.5rem;">Pembayaran SIMAKSI</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            
            <!-- Body -->
            <div class="modal-body" style="padding: 32px;">
                <!-- Greeting -->
                <div style="text-align: center; margin-bottom: 24px;">
                    <p style="font-size: 1.1rem; margin: 0;">Halo, <strong style="color: #104734;">{{ Auth::user()->name }}</strong> 👋</p>
                    <p style="color: #6c757d; font-size: 0.9rem; margin-top: 4px;">Silakan cek detail pembayaran Anda di bawah ini</p>
                </div>

                <!-- Detail Card -->
                <div style="background: linear-gradient(135deg, #f8fffe 0%, #e8f5e9 100%); border-radius: 16px; padding: 24px; margin-bottom: 24px; border: 2px solid #c8e6c9;">
                    <!-- Row Item -->
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #d4edda;">
                        <span style="color: #6c757d; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                            <span style="font-size: 1.2rem;">🏔️</span> Gunung
                        </span>
                        <span id="modalGunung" style="color: #104734; font-weight: 700; font-size: 1.05rem;"></span>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #d4edda;">
                        <span style="color: #6c757d; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                            <span style="font-size: 1.2rem;">🚶</span> Rute
                        </span>
                        <span id="modalRute" style="color: #104734; font-weight: 700; font-size: 1.05rem;"></span>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #d4edda;">
                        <span style="color: #6c757d; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                            <span style="font-size: 1.2rem;">📅</span> Tanggal Pendakian
                        </span>
                        <span id="modalTanggal" style="color: #104734; font-weight: 700; font-size: 1.05rem;"></span>
                    </div>

                    <!-- Biaya SIMAKSI -->
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #d4edda;">
                        <span style="color: #6c757d; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                            <span style="font-size: 1.2rem;">💰</span> Biaya SIMAKSI
                        </span>
                        <span id="modalBiayaSimaksi" style="color: #104734; font-weight: 700; font-size: 1.05rem;"></span>
                    </div>

                    <!-- Biaya Peminjaman Alat -->
                    <div id="modalBiayaAlatContainer" style="display: none; padding: 12px 0; border-bottom: 1px solid #d4edda;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="color: #6c757d; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 1.2rem;">🛠️</span> Biaya Peminjaman Alat
                            </span>
                            <span id="modalBiayaAlat" style="color: #104734; font-weight: 700; font-size: 1.05rem;"></span>
                        </div>
                        <!-- Detail Alat yang Dipinjam -->
                        <div id="modalAlatDetail" style="margin-top: 12px; padding: 12px; background: rgba(255,255,255,0.7); border-radius: 8px; font-size: 0.9rem;">
                            <!-- Detail alat akan diisi oleh JavaScript -->
                        </div>
                    </div>

                    <!-- Total Bayar - Highlighted -->
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 0; margin-top: 8px;">
                        <span style="color: #104734; font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 8px;">
                            <span style="font-size: 1.4rem;">💰</span> Total Bayar
                        </span>
                        <span style="color: #28a745; font-weight: 700; font-size: 1.5rem;">
                            Rp<span id="modalTotal"></span>
                        </span>
                    </div>
                </div>

                <!-- Buttons -->
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <button id="btnBayarSekarang" class="btn btn-success w-100" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border: none; padding: 16px; border-radius: 12px; font-weight: 700; font-size: 1.1rem; display: flex; align-items: center; justify-content: center; gap: 10px; transition: all 0.3s ease;">
                        <span style="font-size: 1.3rem;">💳</span>
                        <span>Bayar Sekarang</span>
                    </button>
                    
                    <button id="btnCetakPdf" class="btn btn-outline-success w-100" style="display: none; border: 2px solid #28a745; color: #28a745; background: white; padding: 14px; border-radius: 12px; font-weight: 600; font-size: 1rem; transition: all 0.3s ease;">
                        🖨️ Cetak Formulir SIMAKSI
                    </button>
                </div>

                <!-- Info Text -->
                <div style="text-align: center; margin-top: 20px;">
                    <p style="color: #6c757d; font-size: 0.85rem; margin: 0;">
                        <span style="color: #28a745;">🔒</span> Pembayaran aman dan terenkripsi
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Midtrans Script -->
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<!-- Main JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const gunungSelect = document.getElementById('gunung_id');
    const ruteSelect = document.getElementById('rute_pendakian_id');
    const hargaInput = document.getElementById('harga');
    const totalInput = document.getElementById('total_biaya');
    const jumlahInput = document.getElementById('jumlah_pendaki');
    const tglNaik = document.getElementById('tanggal_pendakian');
    const tglTurun = document.getElementById('tanggal_turun');
    const anggotaContainer = document.getElementById('anggotaContainer');
    const anggotaList = document.getElementById('anggotaList');
    const alatContainer = document.getElementById('alatContainer');
    const form = document.getElementById('formPendaftaran');
    const hargaRawInput = document.getElementById('harga_raw');

    

    // ==========================================================
    // 🔹 FETCH DAFTAR ALAT PEMINJAMAN
    // ==========================================================
    function loadAlatPeminjaman() {
        fetch('http://localhost:8001/api/alats')
            .then(res => {
                if (!res.ok) throw new Error('Gagal memuat daftar alat');
                return res.json();
            })
            .then(data => {
                if (data && data.length > 0) {
                    renderAlatForm(data);
                } else {
                    alatContainer.innerHTML = '<p class="text-muted">Tidak ada alat tersedia untuk dipinjam.</p>';
                }
            })
            .catch(err => {
                console.error('Error loading alat:', err);
                alatContainer.innerHTML = '<p class="text-danger">Gagal memuat daftar alat. Sistem peminjaman mungkin sedang offline.</p>';
            });
    }

    // ==========================================================
    // 🔹 RENDER FORM ALAT PEMINJAMAN
    // ==========================================================
    function renderAlatForm(alats) {
        // Remove duplicates based on id or name
        const uniqueAlats = alats.filter((alat, index, self) =>
            index === self.findIndex(a => a.id === alat.id || (a.nama || a.nama_alat) === (alat.nama || alat.nama_alat))
        );

        let html = '<div class="row">';

        uniqueAlats.forEach(alat => {
            html += `
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #e0e0e0; border-radius: 8px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-title mb-0">${alat.nama || alat.nama_alat || 'Alat pendakian'}</h6>
                                <span class="badge bg-success">Rp${new Intl.NumberFormat('id-ID').format(alat.harga || alat.harga_sewa || 0)}</span>
                            </div>
                            <p class="card-text small text-muted mb-2">${alat.deskripsi || 'Alat pendakian'}</p>
                            <div class="d-flex align-items-center gap-2">
                                <label class="form-label mb-0 small">Jumlah:</label>
                                <input type="number" name="alat_peminjaman[${alat.id}]" class="form-control form-control-sm alat-input"
                                       min="0" max="${alat.stok}" value="0" style="width: 80px;" data-harga="${alat.harga || alat.harga_sewa || 0}">
                                <small class="text-muted">Stok: ${alat.stok}</small>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        html += '</div>';
        html += '<div class="alert alert-info small mt-3">';
        html += '<i class="fas fa-info-circle"></i> Pilih jumlah alat yang ingin dipinjam. Kosongkan jika tidak ingin meminjam.';
        html += '</div>';

        alatContainer.innerHTML = html;

        // Add event listeners to calculate total
        document.querySelectorAll('.alat-input').forEach(input => {
            input.addEventListener('input', updateTotalBiayaAlat);
        });
    }

    // Load alat saat halaman load
    loadAlatPeminjaman();

    // ==========================================================
    // 🔹 UPDATE TOTAL BIAYA ALAT PEMINJAMAN
    // ==========================================================
    function updateTotalBiayaAlat() {
        let total = 0;
        document.querySelectorAll('.alat-input').forEach(input => {
            const quantity = parseInt(input.value) || 0;
            const harga = parseInt(input.getAttribute('data-harga')) || 0;
            total += quantity * harga;
        });
        const totalElement = document.getElementById('totalBiayaAlat');
        if (totalElement) {
            totalElement.textContent = new Intl.NumberFormat('id-ID').format(total);
        }
        updateTotalKeseluruhan();
    }

    // ==========================================================
    // 🔹 UPDATE TOTAL BIAYA KESELURUHAN
    // ==========================================================
    function updateTotalKeseluruhan() {
        const biayaSimaksi = parseInt(totalInput.value.replace(/\D/g, '')) || 0;
        const biayaAlat = parseInt(document.getElementById('totalBiayaAlat').textContent.replace(/\D/g, '')) || 0;
        const totalKeseluruhan = biayaSimaksi + biayaAlat;

        const totalElement = document.getElementById('totalBiayaKeseluruhan');
        if (totalElement) {
            totalElement.textContent = new Intl.NumberFormat('id-ID').format(totalKeseluruhan);
        }
    }

    // ==========================================================
    // 🔹 SET MINIMAL TANGGAL HARI INI
    // ==========================================================
    function setMinDate() {
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const todayString = today.toISOString().split('T')[0];
        
        if (tglNaik) {
            tglNaik.min = todayString;
            tglNaik.setAttribute('min', todayString);
        }
        if (tglTurun) {
            tglTurun.min = todayString;
            tglTurun.setAttribute('min', todayString);
        }
    }
    
    setMinDate();

    // ==========================================================
    // 🔹 FUNGSI UPDATE TOTAL BIAYA
    // ==========================================================
    function updateTotal() {
        let harga = 0;
        
        // Prioritas ambil dari hidden input (untuk preset)
        if (hargaRawInput && hargaRawInput.value) {
            harga = parseInt(hargaRawInput.value) || 0;
        } else {
            harga = parseInt(hargaInput.value.replace(/\D/g, '')) || 0;
        }
        
        const jumlah = parseInt(jumlahInput.value) || 1;
        const total = harga * jumlah;
        
        hargaInput.value = new Intl.NumberFormat('id-ID').format(harga);
        totalInput.value = new Intl.NumberFormat('id-ID').format(total);
        
        console.log('💰 Update Total:', { harga, jumlah, total });
    }

    // ==========================================================
    // 🔹 CEK MODE FORM (MANUAL vs PRESET)
    // ==========================================================
    const isManualForm = gunungSelect && gunungSelect.tagName === 'SELECT';
    const isPresetForm = !isManualForm && hargaRawInput && hargaRawInput.value;
    
    console.log('📋 Mode Form:', isManualForm ? 'MANUAL' : 'PRESET');

    // ==========================================================
    // 🔹 JIKA FORM PRESET (DARI HALAMAN GUNUNG)
    // ==========================================================
    if (isPresetForm) {
        console.log('✅ Form preset terdeteksi, loading harga...');
        updateTotal(); // Langsung update total dari harga yang sudah ada
    }

    // ==========================================================
    // 🔹 FETCH RUTE BERDASARKAN GUNUNG (UNTUK FORM MANUAL)
    // ==========================================================
    if (isManualForm && ruteSelect) {
        // Event saat gunung dipilih
        gunungSelect.addEventListener('change', function() {
            const gunungId = this.value;
            
            // Reset rute dan harga
            ruteSelect.innerHTML = '<option value="">Memuat...</option>';
            hargaInput.value = '0';
            totalInput.value = '0';
            
            if (!gunungId) {
                ruteSelect.innerHTML = '<option value="">-- Pilih Rute --</option>';
                ruteSelect.disabled = true;
                return;
            }

            // Fetch rute dari server
            fetch(`/api/rute-by-gunung/${gunungId}`)
                .then(res => {
                    if (!res.ok) throw new Error('Gagal memuat rute');
                    return res.json();
                })
                .then(data => {
                    ruteSelect.innerHTML = '<option value="">-- Pilih Rute --</option>';
                    
                    if (data.length === 0) {
                        const opt = document.createElement('option');
                        opt.value = '';
                        opt.textContent = 'Tidak ada rute tersedia';
                        ruteSelect.appendChild(opt);
                        ruteSelect.disabled = true;
                    } else {
                        data.forEach(r => {
                            const opt = document.createElement('option');
                            opt.value = r.id_rute;
                            opt.textContent = r.nama_rute;
                            opt.setAttribute('data-harga', r.harga);
                            ruteSelect.appendChild(opt);
                        });
                        ruteSelect.disabled = false;
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    ruteSelect.innerHTML = '<option value="">Gagal memuat rute</option>';
                    alert('⚠️ Gagal memuat data rute. Silakan coba lagi.');
                });
        });

        // Event saat rute dipilih
        ruteSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga') || 0;
            
            hargaInput.value = new Intl.NumberFormat('id-ID').format(harga);
            updateTotal();
        });
    }

    // ==========================================================
    // 🔹 UPDATE TOTAL SAAT JUMLAH PENDAKI BERUBAH
    // ==========================================================
    if (jumlahInput) {
        jumlahInput.addEventListener('input', function() {
            updateTotal();
            updateAnggotaForms();
        });
    }

    // ==========================================================
    // 🔹 VALIDASI TANGGAL
    // ==========================================================
    if (tglNaik) {
        tglNaik.addEventListener('change', function() {
            const naik = new Date(this.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (naik < today) {
                alert("⚠️ Tanggal naik tidak boleh sebelum hari ini!");
                this.value = '';
                return;
            }
            
            if (tglTurun) {
                tglTurun.min = this.value;
                
                if (tglTurun.value) {
                    const turun = new Date(tglTurun.value);
                    if (turun <= naik) {
                        alert("⚠️ Tanggal turun harus setelah tanggal naik!");
                        tglTurun.value = '';
                    }
                }
            }
        });
    }

    if (tglTurun) {
        tglTurun.addEventListener('change', function() {
            const turun = new Date(this.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (turun < today) {
                alert("⚠️ Tanggal turun tidak boleh sebelum hari ini!");
                this.value = '';
                return;
            }
            
            if (tglNaik.value) {
                const naik = new Date(tglNaik.value);
                if (turun <= naik) {
                    alert("⚠️ Tanggal turun harus setelah tanggal naik!");
                    this.value = '';
                }
            }
        });
    }

    // ==========================================================
    // 🔹 UPDATE FORM ANGGOTA
    // ==========================================================
    function updateAnggotaForms() {
        const jumlah = parseInt(jumlahInput.value) || 1;
        anggotaList.innerHTML = '';

        if (jumlah > 1) {
            anggotaContainer.style.display = 'block';
            for (let i = 0; i < jumlah - 1; i++) {
                const div = document.createElement('div');
                div.classList.add('anggota-item');
                div.innerHTML = `
                    <h6>🧍 Anggota ${i + 2}</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="anggota[${i}][nama]" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="anggota[${i}][jenis_kelamin]" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label>Umur</label>
                            <input type="number" name="anggota[${i}][usia]" class="form-control" min="10" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>No. Telepon</label>
                            <input type="text" name="anggota[${i}][no_telepon]" class="form-control" placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Jenis Identitas</label>
                            <select name="anggota[${i}][jenis_identitas]" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="KTP">KTP</option>
                                <option value="SIM">SIM</option>
                                <option value="KK">KK</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>No. Identitas</label>
                            <input type="text" name="anggota[${i}][no_identitas]" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Foto Identitas</label>
                            <input type="file" name="anggota[${i}][foto_identitas]" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                `;
                anggotaList.appendChild(div);
            }
        } else {
            anggotaContainer.style.display = 'none';
        }
    }

    // ==========================================================
    // 🔹 SUBMIT FORM
    // ==========================================================
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const btn = form.querySelector('.btn-submit');
        btn.disabled = true;
        btn.textContent = "⏳ Menyimpan...";

        const formData = new FormData(form);

        // Validasi total biaya
        const total = parseInt(totalInput.value.replace(/\D/g, '')) || 0;
        if (total <= 0) {
            alert("⚠️ Harga pendakian belum tersedia. Silakan pilih rute atau periksa data.");
            btn.disabled = false;
            btn.textContent = "💾 Simpan & Bayar Sekarang";
            return;
        }

        fetch("/pendaftaran", {
            method: "POST",
            body: formData,
            headers: { 
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                "Accept": "application/json"
            }
        })
        .then(res => {
            if (!res.ok) {
                // try to get response body (text or json) for debugging
                return res.text().then(text => {
                    let msg = text || res.statusText || 'Unknown error';
                    // attempt to parse JSON for message field
                    try {
                        const j = JSON.parse(text);
                        if (j.message) msg = j.message;
                        else if (j.errors) msg = JSON.stringify(j.errors);
                    } catch (e) {
                        // not JSON
                    }
                    throw new Error(res.status + ' - ' + msg);
                });
            }
            return res.json();
        })
        .then(data => {
            if (data.success && data.snap_token) {
                // Ambil nama gunung & rute
                let gunungText = "";
                let ruteText = "";

                if (isManualForm) {
                    gunungText = gunungSelect.selectedOptions[0]?.text || '';
                    ruteText = ruteSelect.selectedOptions[0]?.text || '';
                } else {
                    // Untuk preset form
                    const gunungInput = document.querySelector('input[name="gunung_id"]');
                    const ruteInput = document.querySelector('input[name="rute_pendakian_id"]');

                    if (gunungInput && gunungInput.previousElementSibling) {
                        gunungText = gunungInput.previousElementSibling.value;
                    }
                    if (ruteInput && ruteInput.previousElementSibling) {
                        ruteText = ruteInput.previousElementSibling.value;
                    }
                }

                // Hitung biaya SIMAKSI dan biaya alat
                const biayaSimaksi = parseInt(totalInput.value.replace(/\D/g, '')) || 0;
                const biayaAlat = parseInt(document.getElementById('totalBiayaAlat').textContent.replace(/\D/g, '')) || 0;

                // Isi modal
                document.getElementById('modalGunung').textContent = gunungText;
                document.getElementById('modalRute').textContent = ruteText;
                document.getElementById('modalTanggal').textContent = tglNaik.value;
                document.getElementById('modalBiayaSimaksi').textContent = 'Rp' + new Intl.NumberFormat('id-ID').format(biayaSimaksi);
                document.getElementById('modalTotal').textContent = new Intl.NumberFormat('id-ID').format(data.total_biaya);

                // Tampilkan biaya alat jika ada
                const modalBiayaAlatContainer = document.getElementById('modalBiayaAlatContainer');
                const modalAlatDetail = document.getElementById('modalAlatDetail');

                if (biayaAlat > 0) {
                    modalBiayaAlatContainer.style.display = 'block';
                    document.getElementById('modalBiayaAlat').textContent = 'Rp' + new Intl.NumberFormat('id-ID').format(biayaAlat);

                    // Detail alat yang dipinjam
                    let alatDetailHtml = '<strong>Alat yang dipinjam:</strong><br>';
                    let hasAlat = false;

                    document.querySelectorAll('.alat-input').forEach(input => {
                        const quantity = parseInt(input.value) || 0;
                        if (quantity > 0) {
                            hasAlat = true;
                            const harga = parseInt(input.getAttribute('data-harga')) || 0;
                            const namaAlat = input.closest('.card-body').querySelector('.card-title').textContent;
                            const totalHarga = quantity * harga;

                            alatDetailHtml += `• ${namaAlat} (${quantity}x) - Rp${new Intl.NumberFormat('id-ID').format(totalHarga)}<br>`;
                        }
                    });

                    if (hasAlat) {
                        modalAlatDetail.innerHTML = alatDetailHtml;
                    } else {
                        modalAlatDetail.innerHTML = '<em>Tidak ada alat yang dipinjam</em>';
                    }
                } else {
                    modalBiayaAlatContainer.style.display = 'none';
                }

                const modal = new bootstrap.Modal(document.getElementById('modalPembayaran'));
                modal.show();

                document.getElementById('btnBayarSekarang').onclick = function() {
                    modal.hide();
                    window.snap.pay(data.snap_token, {
                        onSuccess: function() {
                            alert("✅ Pembayaran Berhasil! Silakan tunggu persetujuan admin untuk mencetak formulir SIMAKSI.");
                            window.location.href = "/pendaftaran";
                        },
                        onPending: function() {
                            alert("🕓 Pembayaran menunggu konfirmasi.");
                            window.location.href = "/pendaftaran";
                        },
                        onError: function() {
                            alert("❌ Terjadi kesalahan saat pembayaran.");
                        },
                        onClose: function() {
                            alert("⚠️ Kamu menutup popup sebelum pembayaran selesai.");
                        }
                    });
                };
            } else {
                alert("❌ Gagal membuat transaksi: " + (data.message || "Terjadi kesalahan."));
            }
        })
        .catch(err => {
            console.error('Error:', err);
            // show error details to the user to help debugging
            alert("❌ Terjadi kesalahan: " + err.message + "\n(Periksa console/network & storage/logs/laravel.log untuk detail)");
        })
        .finally(() => {
            btn.disabled = false;
            btn.textContent = "💾 Simpan & Bayar Sekarang";
        });
    });

    // Event tombol Cetak Formulir
    const btnCetak = document.getElementById('btnCetakPdf');
    if (btnCetak) {
        btnCetak.addEventListener('click', function() {
            const id = this.dataset.id;
            if (id) {
                window.open(`/pendaftaran/${id}/cetak`, '_blank');
            } else {
                alert("ID pendaftaran tidak ditemukan.");
            }
        });
    }
});
</script>

 

@endsection
