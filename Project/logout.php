<?php
// 1. Mulai session untuk mengenali sesi siapa yang sedang aktif
session_start();

// 2. Hapus semua data yang tersimpan di dalam session (seperti user_id dan nama)
session_unset();

// 3. Hancurkan session sepenuhnya dari server
session_destroy();

// 4. Arahkan pengguna kembali ke halaman Login (Index.php)
header("Location: Index.php");
exit;
?>