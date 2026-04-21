<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $username = trim($_POST['username']); 
    $pass = $_POST['pass'];


    $sql = "SELECT id, nama_depan, nama_belakang, password FROM users WHERE CONCAT(nama_depan, ' ', nama_belakang) = '$username'";
    
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
      
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama'] = $row['nama_depan'] . ' ' . $row['nama_belakang'];
            
            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Nama Lengkap tidak ditemukan! Pastikan ejaan dan spasinya benar.";
    }
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
  
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    
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