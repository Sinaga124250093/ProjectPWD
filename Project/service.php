<?php
session_start();

$usr = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - konekindong</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="../CSS/Style.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .text-orange { color: #ff4d00 !important; }
        .bg-orange { background-color: #ff4d00 !important; }
        .content-box { background: #fff; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 40px; margin-top: 40px; margin-bottom: 40px; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-orange" href="Beranda.php">konekindong</a>
            <span class="ms-2 text-muted d-none d-lg-block">
            <?php
            $hari = date('l');
            $daftar_hari = array('Sunday'=>'Minggu', 'Monday'=>'Senin', 'Tuesday'=>'Selasa', 'Wednesday'=>'Rabu', 'Thursday'=>'Kamis', 'Friday'=>'Jumat', 'Saturday'=>'Sabtu');
            echo $daftar_hari[$hari] . ", " . date('d / m / Y');
            ?> 
            </span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link mx-2" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="Beranda.php#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="Beranda.php#paket">Paket</a></li>
                    
                    <li class="nav-item ms-2 mt-2 mt-lg-0 dropdown">
                        <?php if (!empty($usr)): ?>
                            <a class="btn btn-primary rounded-pill px-4 dropdown-toggle bg-orange border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: inline-flex; align-items: center;">
                                <img src="../ASSET/user.png" alt="User" style="width: 16px; height: 16px; margin-right: 8px;">
                                Halo, <?= htmlspecialchars($usr) ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                                <li><a class="dropdown-item fw-bold text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        <?php else: ?>
                            <a class="btn btn-outline-primary px-4 rounded-pill" href="Index.php" style="border-color: #ff4d00; color: #ff4d00;">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-box">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold text-orange">Syarat & Ketentuan Layanan</h2>
                        <p class="text-muted">Terakhir diperbarui: Mei 2026</p>
                    </div>

                    <p>Dengan mengakses situs web dan mendaftar pada layanan Konekindong, Anda menyetujui dan terikat oleh syarat dan ketentuan berikut. Harap baca dengan saksama.</p>

                    <h5 class="fw-bold mt-4">1. Deskripsi Layanan</h5>
                    <p>Konekindong menyediakan layanan akses internet <i>broadband</i> prabayar berbasis fiber optik dengan berbagai pilihan kecepatan. Layanan disediakan selama 24 jam sehari, 7 hari seminggu, kecuali saat terjadi pemeliharaan jaringan (<i>maintenance</i>) darurat atau hal di luar kendali kami (<i>force majeure</i>).</p>

                    <h5 class="fw-bold mt-4">2. Pendaftaran dan Akun Pengguna</h5>
                    <ul>
                        <li>Pengguna wajib memberikan informasi yang akurat, lengkap, dan terbaru saat mengisi formulir Konfirmasi Pembayaran dan pemasangan.</li>
                        <li>Pengguna bertanggung jawab penuh untuk menjaga kerahasiaan <i>username</i> dan <i>password</i> akun. Konekindong tidak bertanggung jawab atas kerugian yang timbul akibat kelalaian pengguna.</li>
                    </ul>

                    <h5 class="fw-bold mt-4">3. Pembayaran dan Penagihan</h5>
                    <ul>
                        <li>Sistem berlangganan Konekindong adalah prabayar (bayar di awal).</li>
                        <li>Pembayaran tagihan (<i>invoice</i>) harus dilakukan menggunakan metode yang disediakan dan sah (Transfer Bank BCA/Mandiri atau QRIS E-Wallet).</li>
                        <li>Proses instalasi baru akan dijadwalkan setelah status pembayaran pada sistem terverifikasi lunas.</li>
                    </ul>

                    <h5 class="fw-bold mt-4">4. Penggunaan yang Dilarang</h5>
                    <p>Koneksi internet yang disediakan oleh Konekindong tidak boleh digunakan untuk:</p>
                    <ul>
                        <li>Aktivitas ilegal yang melanggar hukum dan peraturan perundang-undangan di Republik Indonesia.</li>
                        <li>Mendistribusikan <i>malware</i>, <i>spam</i>, atau melakukan serangan siber.</li>
                        <li>Menjual kembali (<i>resell</i>) <i>bandwidth</i> internet kepada pihak ketiga tanpa izin tertulis dari Konekindong.</li>
                    </ul>
                    <p>Jika ditemukan pelanggaran, kami berhak memutus layanan tanpa pengembalian dana.</p>

                    <h5 class="fw-bold mt-4">5. Perubahan Layanan dan Syarat</h5>
                    <p>Konekindong berhak untuk mengubah tarif paket, spesifikasi layanan, atau isi dari Syarat & Ketentuan ini kapan saja dengan memberikan pemberitahuan terlebih dahulu kepada pelanggan yang aktif.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark text-white mt-auto">
        <div class="container text-center">
            <h3 class="fw-bold mb-3 text-white">konekindong</h3>
            <p class="mb-4">Koneksi Indonesia Ngebut © 2024. All Rights Reserved.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="privacy.php" class="text-white text-decoration-none">Privacy Policy</a>
                <a href="service.php" class="text-white text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>