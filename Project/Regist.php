<?php
session_start();
require 'koneksi.php'; 

// Cek apakah tombol dengan name="btn_register" sudah ditekan
if (isset($_POST['register'])) {
    $namaDepan = $_POST['namaDepan'];
    $namaBelakang = $_POST['namaBelakang'];
    $email = $_POST['email'];
    $alamat = $_POST['adr'];
    $nohp = $_POST['days'];
    $pass = $_POST['pass'];
    $pas = $_POST['pas'];

    if ($pass === $pas) {
        
       
        $query_cek = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

       
        if (mysqli_fetch_assoc($query_cek)) {    
            echo "<script>alert('Gagal! Email ini sudah terdaftar. Silakan gunakan email lain.');</script>";
        } else {
            
            $sql_insert = "INSERT INTO users (nama_depan, nama_belakang, email, alamat, no_hp, password) 
                           VALUES ('$namaDepan', '$namaBelakang', '$email', '$alamat', '$nohp', '$pass')";
            
           
            if (mysqli_query($conn, $sql_insert)) {
                echo "<script>
                    alert('Registrasi Berhasil! Silakan Login dengan akun baru Anda.'); 
                    window.location.href = 'Index.php';
                </script>";
                exit; 
            } else {
               
                echo "<script>alert('Terjadi kesalahan sistem: " . mysqli_error($conn) . "');</script>";
            }
        }
    } else {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <title>Registrasi - konekindong</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">konekindong</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link mx-2" href="Index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card mx-auto home container pb-5 mb-5 mt-5 shadow" id="pemesanan" style="max-width: 800px; border-radius: 15px;">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4">Form Registrasi Pengguna</h4>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="namaDepan" class="form-label fw-semibold">Nama Depan</label>
                        <input type="text" class="form-control" placeholder="Nama Depan" id="namaDepan" name="namaDepan" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="namaBelakang" class="form-label fw-semibold">Nama Belakang</label>
                        <input type="text" class="form-control" placeholder="Nama Belakang" id="namaBelakang" name="namaBelakang" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="adr" class="form-label fw-semibold">Alamat</label>
                        <input type="text" class="form-control" id="adr" name="adr" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="days" class="form-label fw-semibold">No. HP</label>
                        <input type="number" class="form-control" name="days" id="days" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pass" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukkan Password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pas" class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="pas" name="pas" placeholder="Ketik ulang Password" required>
                    </div>
                </div>
                
                
                <button type="submit" name="register" class="btn btn-primary w-100 py-2 mt-4 rounded-pill fw-bold" style="background-color: #ff4d00; border: none;">Daftar Sekarang</button>
            </form>
        </div>
    </div>
</body>
</html>