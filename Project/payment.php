<?php
session_start();
require 'koneksi.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$user_id = $_SESSION['user_id'];
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$data_user = mysqli_fetch_assoc($query_user);


$paket_nama = isset($_GET['paket']) ? $_GET['paket'] : 'Belum Memilih';
$paket_harga = isset($_GET['harga']) ? $_GET['harga'] : 0;
$paket_speed = isset($_GET['speed']) ? $_GET['speed'] : 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $metode_bayar = $_POST['metode_pembayaran'];
    $detail_alamat = mysqli_real_escape_string($conn, $_POST['detail_alamat']);

    $no_invoice = "INV-" . date("Ymd") . "-" . rand(100,999);

    // Simpan ke history
    mysqli_query($conn, "INSERT INTO history_pemesanan 
    (user_id, no_invoice, nama_paket, speed, harga, metode_pembayaran, detail_alamat)
    
    VALUES
    
    ('$user_id', '$no_invoice', '$paket_nama', '$paket_speed', '$paket_harga', '$metode_bayar', '$detail_alamat')");

    header("Location: invoice.php?invoice=$no_invoice&nama_paket=$paket_nama&harga=$paket_harga&speed=$paket_speed&metode=$metode_bayar&detail_alamat=$detail_alamat");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - konekindong</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/Style.css" rel="stylesheet"> 
    <style>
        .payment-card { border-radius: 20px; border: none; }
        .summary-box { background: #f8f9fa; border-radius: 15px; padding: 20px; }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg payment-card">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-4">Konfirmasi Pembayaran</h2>
                    
                    <form action="" method="POST">
    <input type="hidden" name="nama_paket" value="<?= $paket_nama ?>">
    <input type="hidden" name="harga" value="<?= $paket_harga ?>">
    <input type="hidden" name="speed" value="<?= $paket_speed ?>">
                        <div class="row g-4">
                            
                            <div class="col-md-7">
                                <h5 class="mb-3 fw-bold">Informasi Pelanggan</h5>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label text-muted small">Nama Lengkap</label>
                                        <input type="text" class="form-control bg-white" value="<?= $data_user['nama_depan'] . ' ' . $data_user['nama_belakang'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-muted small">Email</label>
                                        <input type="text" class="form-control bg-white" value="<?= $data_user['email'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-muted small">No. HP</label>
                                        <input type="text" class="form-control bg-white" value="<?= $data_user['no_hp'] ?>" readonly>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label text-muted small">Alamat Utama</label>
                                        <textarea class="form-control bg-white" rows="2" readonly><?= $data_user['alamat'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-semibold">Detail Alamat Pemasangan (Lantai/No Rumah)</label>
                                        <input type="text" name="detail_alamat" class="form-control" placeholder="Contoh: Lantai 2, Blok A No. 5" required>
                                    </div>
                                </div>
                            </div>

                          
                            <div class="col-md-5">
                                <div class="summary-box">
                                    <h5 class="fw-bold mb-3">Ringkasan Paket</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Paket:</span>
                                        <span class="fw-bold text-brand">Paket <?= $paket_nama ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Kecepatan:</span>
                                        <span><?= $paket_speed ?> Mbps</span>
                                    </div>
                                    <hr>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                                        <select name="metode_pembayaran" class="form-select" required>
                                            <option value="">Pilih Metode...</option>
                                            <option value="Transfer Bank">Transfer Bank (BCA/Mandiri)</option>
                                            <option value="E-Wallet">E-Wallet (OVO/Dana/Gopay)</option>
                                            <option value="QRIS">QRIS</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <span class="fs-5">Total Bayar:</span>
                                        <span class="fs-4 fw-bold text-brand">Rp <?= number_format($paket_harga, 0, ',', '.') ?></span>
                                    </div>
                                    <button type="submit" class="btn btn-brand w-100 py-3 rounded-pill fw-bold">Bayar Sekarang</button>
                                    <a href="index.php" class="btn btn-link w-100 text-muted mt-2 text-decoration-none small">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>