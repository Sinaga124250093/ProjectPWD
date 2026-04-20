<?php
session_start();
require 'koneksi.php';

// Jika pengguna sudah login, langsung arahkan ke beranda (mainpage)
if (isset($_SESSION['user_id'])) {
    header("Location: mainpage.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form, trim() digunakan untuk menghapus spasi tidak sengaja di awal/akhir ketikan
    $username = trim($_POST['username']); 
    $pass = $_POST['pass'];

    // Cari user berdasarkan GABUNGAN (CONCAT) nama_depan + spasi + nama_belakang
    $stmt = $conn->prepare("SELECT id, nama_depan, nama_belakang, password FROM users WHERE CONCAT(nama_depan, ' ', nama_belakang) = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Cek kecocokan password dengan password hash di database
        if (password_verify($pass, $row['password'])) {
            // SET SESSION
            $_SESSION['user_id'] = $row['id'];
            // Simpan nama lengkap di session agar di mainpage.php muncul nama lengkapnya
            $_SESSION['nama'] = $row['nama_depan'] . ' ' . $row['nama_belakang'];
            
            header("Location: mainpage.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Nama Lengkap tidak ditemukan! Pastikan ejaan dan spasinya benar.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - konekindong</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
</head>
<body>
  
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" 
       style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../ASSET/logo.png'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 20px; border: none;">
      <div class="card-body">
        <h4 class="text-center mb-4 fw-bold">Login</h4>
        
        <h6 class="text-center text-muted mb-4" style="font-size: 0.9rem;">  
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
            ?> 
        </h6>

        <?php if(!empty($error)): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
          
          <div class="mb-3">
            <label for="username" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" class="form-control px-3 py-2" placeholder="Contoh: Budi Santoso" id="username" name="username" required>
          </div>
          
          <div class="mb-3">
            <label for="pass" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control px-3 py-2" placeholder="Masukkan password" id="pass" name="pass" required>
          </div>

          <button type="submit" class="btn btn-brand w-100 py-2 mt-3 rounded-pill fw-bold">
            Login ke Beranda
          </button>
          
        </form>

        <hr class="my-4">

        <p class="text-center mb-0" style="font-size: 0.9rem;">
          Belum punya akun? <a href="Regist.php" class="text-decoration-none fw-bold text-brand">Daftar Sekarang</a>
        </p>

      </div>
    </div>
  </div>

</body>
</html>