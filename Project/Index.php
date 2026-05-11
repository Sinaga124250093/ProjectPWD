<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$usr = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konekindong - Koneksi Indonesia Ngebut</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="../CSS/Style.css" rel="stylesheet">
     
    <style>
       
        .feature-block .inner-box {
            position: relative;
            overflow: hidden;
            height: 100%;
            padding: 40px 40px 30px;
            background-color: #ffffff;
            -webkit-box-shadow: 0 10px 60px rgba(0, 0, 0, 0.1);
            box-shadow: 0 10px 60px rgba(0, 0, 0, 0.1);
            -webkit-transition: transform 300ms ease;
            transition: transform 300ms ease;
            z-index: 1;
        }

        .feature-block .inner-box::before {
            content: "";
            position: absolute;
            top: 100%; 
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../ASSET/pola.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: top 400ms ease-in-out; 
            z-index: -1; 
        }

        .feature-block .inner-box .icon-img {
            width: 50px; 
            height: 50px;
            margin-bottom: 20px;
            object-fit: contain;
            transition: all 300ms ease;
        }
        
        .feature-block .inner-box .title a {
            text-decoration: none;
            color: #333;
            font-weight: 700;
            transition: all 300ms ease;
        }

        .feature-block .inner-box:hover {
            transform: translateY(-10px); 
        }

        .feature-block .inner-box:hover::before {
            top: 0;
        }


        .hero-section {
            position: relative;
            overflow: hidden;
            padding: 80px 0; 
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        .hero-carousel-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .hero-carousel-bg .carousel-inner,
        .hero-carousel-bg .carousel-item {
            height: 100%;
        }

        .hero-carousel-bg img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); 
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="">konekindong   
            <?php
            $hari = date('l');
            $daftar_hari = array(
               'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            );
            $tanggal = date('d / m / Y');
            echo $daftar_hari[$hari] . ", " . $tanggal;
            ?> </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link mx-2" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link mx-2" href="#paket">Paket</a></li>
                    
                    <li class="nav-item ms-2 mt-2 mt-lg-0 dropdown">
                        <?php if (!empty($usr)): ?>
                            <a class="btn btn-primary rounded-pill px-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: inline-flex; align-items: center; background-color: #ff4d00; border: none;">
                                <img src="../ASSET/user.png" alt="User" style="width: 16px; height: 16px; margin-right: 8px;">
                                Halo, <?= $usr ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                                <li><a class="dropdown-item fw-bold text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        <?php else: ?>
                            <a class="btn btn-outline-primary px-4 rounded-pill" href="Index.php">Login</a>
                        <?php endif; ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        
        <div id="carouselExampleAutoplaying" class="carousel slide hero-carousel-bg" data-bs-ride="carousel" data-bs-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="../ASSET/1.jpg" class="d-block w-100" alt="Background 1">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../ASSET/2.jpg" class="d-block w-100" alt="Background 2">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../ASSET/3.jpg" class="d-block w-100" alt="Background 3">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../ASSET/4.jpg" class="d-block w-100" alt="Background 4">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="../ASSET/5.jpg" class="d-block w-100" alt="Background 5">
                </div>
            </div>
        </div>

        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold text-white">Nikmati <span class="text-orange" style="color:#ff4d00;">Koneksi Indonesia Ngebut</span> Tanpa Batas!</h1>
                    <p class="lead text-light my-4">Solusi internet tercepat dan stabil untuk mendukung produktivitas, gaming, hingga streaming di seluruh penjuru Indonesia.</p>
                    <div class="d-flex gap-3">
                        <a href="#paket" class="btn btn-primary rounded-pill px-4 py-2">Langganan Sekarang</a>
                        <a href="#layanan" class="btn btn-outline-light rounded-pill px-4 py-2">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                    <img src="../ASSET/logo.png" alt="Hero Image" class="img-fluid rounded shadow-lg" style="max-height: 400px;">
                </div>
            </div>
        </div>
        
    </header>
    
    <section id="layanan" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Mengapa Memilih Kami?</h2>
                <p class="text-muted">Kualitas koneksi terbaik untuk masa depan digital Anda.</p>
            </div>
            <div class="row g-4 text-center">
                
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="title-box">
                            <img src="../ASSET/speed-test.png" alt="High Speed" class="icon-img">
                            <h5 class="title"><a href="#">High Speed</a></h5>
                        </div>
                        <div class="text text-muted mt-3">Menyediakan koneksi internet yang cepat dan stabil.</div>
                    </div>
                </div>
                
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="title-box">
                            <img src="../ASSET/earth.png" alt="Jangkauan Luas" class="icon-img">
                            <h5 class="title"><a href="#">Jangkauan Luas</a></h5>
                        </div>
                        <div class="text text-muted mt-3">Menghubungkan Indonesia dari Sabang sampai Merauke dengan infrastruktur terbaik.</div>
                    </div>
                </div>

                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="200ms" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="title-box">
                            <img src="../ASSET/headset.png" alt="Dukungan 24/7" class="icon-img">
                            <h5 class="title"><a href="#">Dukungan 24/7</a></h5>
                        </div>
                        <div class="text text-muted mt-3">Tim teknis kami siap membantu Anda kapan saja untuk memastikan koneksi tetap lancar.</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

   <section id="paket" class="bg-light py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pilihan Paket Ngebut</h2>
                <p class="text-muted">Pilih paket yang sesuai dengan kebutuhan digital Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 card-pricing p-4 text-center">
                        <div class="card-body">
                            <h5>Paket Santai</h5>
                            <h2 class="fw-bold py-3">20 Mbps</h2>
                            <p class="text-muted">Cocok untuk penggunaan harian dan media sosial.</p>
                            <hr>
                            <p class="fw-bold fs-4 text-orange">Rp 199.000 <small class="text-muted">/bulan</small></p>
                            <a href="payment.php?paket=Santai&harga=199000&speed=20" class="btn btn-outline-primary w-100 mt-3 rounded-pill" style="color: #000; text-decoration: none;">Pilih Paket</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 card-pricing popular shadow p-4 text-center">
                        <div class="card-body">
                            <span class="badge bg-orange text-white mb-2" style="background-color: #ff4d00;">Paling Populer</span>
                            <h5>Paket Ngebut</h5>
                            <h2 class="fw-bold py-3 text-orange" style="color: #ff4d00;">50 Mbps</h2>
                            <p class="text-muted">Streaming 4K dan Work From Home jadi lebih lancar.</p>
                            <hr>
                            <p class="fw-bold fs-4 text-orange" style="color: #ff4d00;">Rp 349.000 <small class="text-muted">/bulan</small></p>
                            <a href="payment.php?paket=Ngebut&harga=349000&speed=50" class="btn w-100 mt-3 rounded-pill" style="background-color: #ff4d00; color: #fff; text-decoration: none; border: none;">Pilih Paket</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 card-pricing p-4 text-center">
                        <div class="card-body">
                            <h5>Paket Dewa</h5>
                            <h2 class="fw-bold py-3">100 Mbps</h2>
                            <p class="text-muted">Koneksi maksimal untuk gaming dan bisnis tanpa hambatan.</p>
                            <hr>
                            <p class="fw-bold fs-4 text-orange">Rp 599.000 <small class="text-muted">/bulan</small></p>
                            <a href="payment.php?paket=Dewa&harga=599000&speed=100" class="btn btn-outline-primary w-100 mt-3 rounded-pill" style="color: #000; text-decoration: none;">Pilih Paket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">konekindong</h3>
            <p class="mb-4">Koneksi Indonesia Ngebut © 2024. All Rights Reserved.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="privacy.php" class="text-white text-decoration-none">Privacy Policy</a>
                <a href="service.php" class="text-white text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>