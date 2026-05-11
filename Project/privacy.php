<?php
session_start();

$usr = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - konekindong</title>
    
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
                        <h2 class="fw-bold text-orange">Kebijakan Privasi</h2>
                        <p class="text-muted">Terakhir diperbarui: Mei 2026</p>
                    </div>

                    <p>Selamat datang di Konekindong (Koneksi Indonesia Ngebut). Kami sangat menghargai privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan layanan dan situs web kami.</p>

                    <h5 class="fw-bold mt-4">1. Informasi yang Kami Kumpulkan</h5>
                    <p>Saat Anda melakukan registrasi akun atau memesan layanan internet, kami mengumpulkan informasi berikut:</p>
                    <ul>
                        <li><strong>Informasi Identitas:</strong> Nama lengkap, alamat email aktif, dan nomor telepon/HP.</li>
                        <li><strong>Informasi Lokasi:</strong> Alamat utama dan detail lokasi pemasangan jaringan (nomor rumah/lantai).</li>
                        <li><strong>Informasi Transaksi:</strong> Rincian paket berlangganan yang dipilih dan metode pembayaran.</li>
                    </ul>

                    <h5 class="fw-bold mt-4">2. Penggunaan Informasi</h5>
                    <p>Data yang kami kumpulkan digunakan secara spesifik untuk:</p>
                    <ul>
                        <li>Memproses pendaftaran akun dan verifikasi identitas pelanggan.</li>
                        <li>Menjadwalkan dan memfasilitasi proses instalasi jaringan internet di lokasi pelanggan.</li>
                        <li>Menerbitkan <i>invoice</i> (tagihan) dan memverifikasi pembayaran layanan.</li>
                        <li>Memberikan dukungan teknis 24/7 dan informasi terkait gangguan layanan.</li>
                    </ul>

                    <h5 class="fw-bold mt-4">3. Perlindungan dan Berbagi Data</h5>
                    <p>Kami berkomitmen untuk menjaga keamanan data Anda yang tersimpan di dalam basis data kami. Konekindong tidak akan menjual, menyewakan, atau menukar data pribadi Anda kepada pihak ketiga untuk tujuan pemasaran. Informasi hanya dapat dibagikan kepada tim teknisi lapangan kami semata-mata untuk keperluan instalasi perangkat.</p>

                    <h5 class="fw-bold mt-4">4. Hak Pengguna</h5>
                    <p>Anda memiliki hak untuk mengakses, memperbarui, atau meminta penghapusan data pribadi Anda di sistem kami dengan menghubungi layanan pelanggan Konekindong.</p>
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