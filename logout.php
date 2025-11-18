<?php
session_start();

// HAPUS SEMUA SESSION
session_unset();
session_destroy();

// HENTIKAN AKSES KEMBALI KE HALAMAN SEBELUMNYA
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// REDIRECT KE LOGIN DENGAN PESAN
echo "<script>
        alert('Anda berhasil logout.');
        window.location='login.php';
      </script>";
exit;
?>
