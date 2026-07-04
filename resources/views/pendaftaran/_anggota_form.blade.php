<div id="anggota-container" class="mt-4">
    <h4 class="mb-3 text-success fw-bold">👥 Data Anggota Pendakian</h4>
    <p class="text-muted">Isi data anggota sesuai jumlah pendaki. Jika hanya Anda sendiri, cukup biarkan 1 form pertama.</p>

    <div id="anggota-list">
        <!-- Form anggota akan dibuat otomatis lewat JavaScript -->
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const jumlahInput = document.getElementById('jumlah_pendaki');
    const anggotaList = document.getElementById('anggota-list');

    function createAnggotaForm(index) {
        return `
        <div class="anggota-item border rounded p-3 mb-3 shadow-sm">
            <h5 class="fw-semibold text-success mb-3">🧍 Anggota ${index}</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="anggota[${index}][nama]" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="anggota[${index}][jenis_kelamin]" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Usia</label>
                    <input type="number" name="anggota[${index}][usia]" class="form-control" min="1" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="anggota[${index}][no_telepon]" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jenis Identitas</label>
                    <select name="anggota[${index}][jenis_identitas]" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="KTP">KTP</option>
                        <option value="SIM">SIM</option>
                        <option value="KK">KK</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label>No. Identitas</label>
                    <input type="text" name="anggota[${index}][no_identitas]" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Upload Foto Identitas (KTP/SIM/KK)</label>
                <input type="file" name="anggota[${index}][foto_identitas]" class="form-control" accept="image/*">
            </div>
        </div>
        `;
    }

    function updateAnggotaForms() {
        const jumlah = parseInt(jumlahInput.value) || 1;
        anggotaList.innerHTML = '';
        for (let i = 1; i <= jumlah; i++) {
            anggotaList.innerHTML += createAnggotaForm(i);
        }
    }

    jumlahInput.addEventListener('change', updateAnggotaForms);
    updateAnggotaForms(); // tampilkan minimal 1 anggota saat halaman dibuka
});
</script>
