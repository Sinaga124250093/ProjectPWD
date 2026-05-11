<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$nama_paket = $_GET['nama_paket'] ?? 'Tidak Diketahui';
$harga = $_GET['harga'] ?? 0;
$speed = $_GET['speed'] ?? 0;
$metode = $_GET['metode'] ?? 'Tidak Dipilih';
$detail_alamat = $_GET['detail_alamat'] ?? '-';

$no_invoice = $_GET['invoice'] ?? 'INV-UNKNOWN';


$user_id = $_SESSION['user_id'];
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$data_user = mysqli_fetch_assoc($query_user);

$no_invoice = "INV-" . date("Ymd") . "-" . rand(100, 999);
$tanggal = date("d F Y");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?= $no_invoice ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="../CSS/Style.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .invoice-box {
            max-width: 800px;
            margin: 30px auto;
            padding: 40px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .invoice-header { border-bottom: 2px solid #eee; padding-bottom: 20px; margin-bottom: 30px; }
        .text-orange { color: #ff4d00; }
        .status-badge {
            padding: 5px 15px;
            border-radius: 50px;
            background: #fff3cd;
            color: #856404;
            font-size: 0.9rem;
            font-weight: 600;
        }
    @media print {
        body {
            background: white !important;
            margin: 0;
            padding: 0;
            font-size: 12pt;
        }

        .no-print {
            display: none !important;
        }

        .invoice-box {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 25px;
            border-radius: 0;
            box-shadow: none;
            border: none;
        }

        .payment-card, .table, .table-responsive, .row, .col-6, .col-md-5 {
            page-break-inside: avoid;
        }

        .table th, .table td {
            padding: 10px !important;
            vertical-align: middle;
        }

        .payment-method-box {
            border: 1px solid #ddd;
            background: white !important;
        }

        img {
            max-width: 100%;
        }

        h1, h2, h3, h4, h5 {
            color: black !important;
        }

        .text-orange {
            color: #ff4d00 !important;
        }

        @page {
            size: A4;
            margin: 15mm;
        }
    }


    .payment-logo {
    height: 40px;
    object-fit: contain;
    margin-bottom: 15px;
    }

    .payment-method-box {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 15px;
        padding: 15px;
        border-radius: 12px;
        background: white;
        border: 1px solid #eee;
    }

    .payment-method-box img {
        width: 70px;
        object-fit: contain;
    }

    .payment-card{
        padding : 30px;
        margin-top: 25px;
    }
     .qris-img{
        width: 60%;
     }
    </style>

</head>
<body>

<div class="container">
    <div class="invoice-box">
        <div class="invoice-header d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold text-orange m-0">konekindong</h1>
                <p class="text-muted small">Koneksi Indonesia Ngebut</p>
            </div>
            <div class="text-end">
                <h4 class="fw-bold m-0">INVOICE</h4>
                <p class="text-muted small"><?= $no_invoice ?></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <h6 class="fw-bold text-muted text-uppercase small">Ditagihkan Kepada:</h6>
                <p class="mb-1 fw-bold"><?= $data_user['nama_depan'] . ' ' . $data_user['nama_belakang'] ?></p>
                <p class="text-muted small mb-0"><?= $data_user['email'] ?></p>
                <p class="text-muted small mb-0"><?= $data_user['no_hp'] ?></p>
            </div>
            <div class="col-6 text-end">
                <h6 class="fw-bold text-muted text-uppercase small">Detail Pemasangan:</h6>
                <p class="mb-1 small"><?= $data_user['alamat'] ?></p>
                <p class="text-muted small italic">(<?= $detail_alamat ?>)</p>
            </div>
        </div>

        <div class="table-responsive mb-4">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Deskripsi Layanan</th>
                        <th class="text-center">Kecepatan</th>
                        <th class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p class="fw-bold mb-0">Paket Internet WiFi - <?= $nama_paket ?></p>
                            <span class="text-muted small">Langganan 1 Bulan (Prabayar)</span>
                        </td>
                        <td class="text-center"><?= $speed ?> Mbps</td>
                        <td class="text-end fw-bold">Rp <?= number_format($harga, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end">
            <div class="col-md-5">
                <div class="d-flex justify-content-between mb-2">
                    <span>Metode Bayar:</span>
                    <span class="fw-bold"><?= $metode ?></span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Status:</span>
                    <span class="status-badge">Menunggu Verifikasi</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold">Total:</h5>
                    <h5 class="fw-bold text-orange">Rp <?= number_format($harga, 0, ',', '.') ?></h5>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="payment-card">

            <?php if ($metode == "Transfer Bank") : ?>

                <h5><b>Pembayaran Transfer Bank</b></h5>
                <p class="mb-3">Silakan transfer ke salah satu rekening berikut:</p>

                <!-- BCA -->
                <div class="payment-method-box">
                    <img src="../ASSET/bca.png" alt="BCA">
                    <div>
                        <div class="fw-bold">Bank BCA</div>
                        <div>1234567890</div>
                        <small>a.n Konekindong Indonesia</small>
                    </div>
                </div>

                <!-- Mandiri -->
                <div class="payment-method-box">
                    <img src="../ASSET/mandiri.png" alt="Mandiri">
                    <div>
                        <div class="fw-bold">Bank Mandiri</div>
                        <div>9876543210</div>
                        <small>a.n Konekindong Indonesia</small>
                    </div>
                </div>

            <?php elseif ($metode == "QRIS") : ?>

                <h5><b>Pembayaran QRIS</b></h5>
                <p>Scan QR berikut:</p>

                <div class="text-center">
                    <img src="../ASSET/qris.png" alt="QRIS" class="img-fluid qris-img">
                </div>

            <?php elseif ($metode == "E-Wallet") : ?>

                <h5>Pembayaran E-Wallet</h5>

                <!-- GOPAY -->
                <div class="payment-method-box">
                    <img src="../ASSET/gopay.png" alt="GoPay">
                    <div>
                        <div class="fw-bold">GoPay</div>
                        <div>081234567890</div>
                        <small>a.n Konekindong Indonesia</small>
                    </div>
                </div>

                <!-- OVO -->
                <div class="payment-method-box">
                    <img src="../ASSET/ovo.png" alt="OVO">
                    <div>
                        <div class="fw-bold">OVO</div>
                        <div>081234567890</div>
                        <small>a.n Konekindong Indonesia</small>
                    </div>
                </div>

                <!-- DANA -->
                <div class="payment-method-box">
                    <img src="../ASSET/dana.png" alt="DANA">
                    <div>
                        <div class="fw-bold">DANA</div>
                        <div>081234567890</div>
                        <small>a.n Konekindong Indonesia</small>
                    </div>
                </div>

            <?php endif; ?>
        </div>

        <div class="mt-5 p-3 bg-light rounded border catatan">
            <p class="small text-muted mb-0"><strong>Catatan:</strong> Silakan lakukan pembayaran sesuai metode yang dipilih. Teknisi akan menghubungi Anda dalam 1x24 jam setelah pembayaran dikonfirmasi untuk jadwal instalasi.</p>
        </div>

        <div class="mt-4 no-print d-flex gap-2">
            <button onclick="window.print()" class="btn btn-dark rounded-pill px-4">Cetak Invoice</button>
            <a href="index.php" class="btn btn-outline-orange rounded-pill px-4">Kembali ke Beranda</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>