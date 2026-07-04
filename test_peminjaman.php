<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Pendaftaran;

echo "=== CEK PEMINJAMAN ID DI DATABASE ===\n\n";

$pendaftaran = Pendaftaran::latest()->first();

if ($pendaftaran) {
    echo "Pendaftaran terbaru:\n";
    echo "- ID Pendaftaran: " . $pendaftaran->id_pendaftaran . "\n";
    echo "- Peminjaman ID: " . ($pendaftaran->peminjaman_id ?? 'NULL') . "\n";
    echo "- Status Peminjaman: " . ($pendaftaran->status_peminjaman ?? 'NULL') . "\n";
    echo "- Biaya Alat: " . ($pendaftaran->biaya_alat ?? 'NULL') . "\n";
    echo "- Status Verifikasi: " . ($pendaftaran->status_verifikasi_peminjaman ?? 'NULL') . "\n";
} else {
    echo "Tidak ada pendaftaran di database\n";
}

echo "\n=== CEK 5 PENDAFTARAN TERBARU ===\n\n";

$pendaftarans = Pendaftaran::latest()->take(5)->get();

foreach ($pendaftarans as $p) {
    echo "ID: {$p->id_pendaftaran} | Peminjaman ID: " . ($p->peminjaman_id ?? 'NULL') . " | Status: " . ($p->status_peminjaman ?? 'NULL') . "\n";
}
