<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran SIMAKSI Gunung</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Midtrans Snap -->
  <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

  <!-- SweetAlert2 for nicer notifications -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

  <style>
    body {
      background: linear-gradient(to bottom right, #e8f5e9, #c8e6c9);
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
      background: #fff;
      width: 380px;
      animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .header {
      background-color: #388e3c;
      color: #fff;
      border-radius: 16px 16px 0 0;
      text-align: center;
      padding: 16px 0;
    }

    .header h4 {
      margin: 0;
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    .card-body {
      padding: 24px;
    }

    .info {
      color: #1b5e20;
      font-weight: 500;
    }

    .label {
      font-weight: 600;
      color: #2e7d32;
    }

    .btn-pay {
      background-color: #43a047;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 12px 0;
      font-weight: 600;
      width: 100%;
      transition: all 0.3s ease;
    }

    .btn-pay:hover {
      background-color: #2e7d32;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="header">
      <h4>Pembayaran SIMAKSI</h4>
    </div>
    <div class="card-body">
      <p class="info">
        Halo, <strong>{{ auth()->user()->name ?? 'Pendaki' }}</strong> 👋
      </p>
      <hr>
      <p><span class="label">Gunung:</span> {{ $pendaftaran->rutePendakian->gunung->nama_gunung ?? '-' }}</p>
      <p><span class="label">Rute:</span> {{ $pendaftaran->rutePendakian->nama_rute ?? '-' }}</p>
      <p><span class="label">Tanggal Pendakian:</span> {{ $pendaftaran->tanggal_pendakian }}</p>
      <p><span class="label">Total Bayar:</span> Rp{{ number_format($pendaftaran->rutePendakian->harga ?? 0, 0, ',', '.') }}</p>
      <hr>
      <button id="pay-button" class="btn-pay">
        💳 Bayar Sekarang
      </button>
    </div>
  </div>

  <script type="text/javascript">
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          Swal.fire({
            icon: 'success',
            title: 'Pembayaran Berhasil',
            text: 'Silakan tunggu persetujuan admin untuk mencetak formulir SIMAKSI.',
            confirmButtonColor: '#28a745'
          }).then(() => { window.location.href = '/pendaftaran'; });
        },
        onPending: function(result){
          Swal.fire({
            icon: 'info',
            title: 'Menunggu Pembayaran',
            text: 'Transaksi kamu masih menunggu penyelesaian.',
          });
        },
        onError: function(result){
          Swal.fire({
            icon: 'error',
            title: 'Pembayaran Gagal',
            text: 'Terjadi kesalahan saat memproses pembayaran. Coba lagi ya.'
          });
        },
        onClose: function(){
          Swal.fire({
            icon: 'warning',
            title: 'Pembayaran Belum Selesai',
            text: 'Kamu menutup popup sebelum pembayaran selesai.'
          });
        }
      });
    });
  </script>
</body>
</html>
