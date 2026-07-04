<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Http;

echo "=== TEST API PEMINJAMAN ALAT ===\n\n";

$baseUrl = config('services.peminjaman_api.url');
echo "Base URL: {$baseUrl}\n\n";

// Test 1: Get Alats
echo "1. Testing GET /alats\n";
try {
    $response = Http::timeout(10)->get("{$baseUrl}/alats");
    echo "Status: " . $response->status() . "\n";
    if ($response->successful()) {
        $alats = $response->json();
        echo "Success! Found " . count($alats) . " alats:\n";
        foreach ($alats as $alat) {
            echo "- ID: {$alat['id']}, Nama: {$alat['nama']}, Stok: {$alat['stok']}, Harga: " . number_format($alat['harga']) . "\n";
        }
    } else {
        echo "Failed: " . $response->body() . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n";

// Test 2: Create Peminjaman
echo "2. Testing POST /peminjaman\n";
try {
    $testData = [
        'user_id' => 1,
        'items' => [
            [
                'alat_id' => 1,
                'jumlah' => 1,
                'harga' => 50000
            ]
        ]
    ];

    echo "Sending data: " . json_encode($testData, JSON_PRETTY_PRINT) . "\n";
    $response = Http::timeout(10)->post("{$baseUrl}/peminjaman", $testData);
    echo "Status: " . $response->status() . "\n";
    echo "Response: " . $response->body() . "\n";

    if ($response->successful()) {
        $data = $response->json();
        echo "Success! Peminjaman ID: " . ($data['peminjaman_id'] ?? 'NULL') . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n";

// Test 3: Test webhook endpoint (if exists)
echo "3. Testing POST /webhooks/create-peminjaman\n";
try {
    $webhookData = [
        'user_id' => 1,
        'items' => [
            [
                'alat_id' => 1,
                'jumlah' => 1,
                'harga' => 50000
            ]
        ],
        'peminjaman_id' => 'TEST_' . time(),
        'webhook_secret' => config('services.peminjaman_api.webhook_secret')
    ];

    echo "Sending webhook data: " . json_encode($webhookData, JSON_PRETTY_PRINT) . "\n";
    $response = Http::timeout(10)->post("{$baseUrl}/webhooks/create-peminjaman", $webhookData);
    echo "Status: " . $response->status() . "\n";
    echo "Response: " . $response->body() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== SELESAI ===\n";
