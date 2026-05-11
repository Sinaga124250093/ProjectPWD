<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "
SELECT * FROM history_pemesanan
WHERE user_id = '$user_id'
ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>History Pemesanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/Style.css" rel="stylesheet">

    <style>
        .history-card {
            border-radius: 20px;
            border: none;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">History Pemesanan</h2>

        <a href="index.php" class="btn btn-brand rounded-pill">
            Kembali
        </a>
    </div>

    <?php while($row = mysqli_fetch_assoc($query)) : ?>

    <div class="card history-card shadow-sm mb-4">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="fw-bold text-brand">
                        <?= $row['nama_paket'] ?>
                    </h5>

                    <p class="mb-1">
                        <?= $row['speed'] ?> Mbps
                    </p>

                    <p class="small text-muted mb-0">
                        <?= $row['no_invoice'] ?>
                    </p>
                </div>

                <div class="text-end">
                    <h5 class="fw-bold">
                        Rp <?= number_format($row['harga'],0,',','.') ?>
                    </h5>

                    <span class="badge bg-warning text-dark">
                        <?= $row['status_pembayaran'] ?>
                    </span>
                </div>
            </div>

            <hr>

            <div class="small text-muted">
                Metode:
                <strong><?= $row['metode_pembayaran'] ?></strong>
            </div>

            <div class="small text-muted">
                <?= $row['tanggal'] ?>
            </div>

        </div>
    </div>

    <?php endwhile; ?>

</div>

</body>
</html>