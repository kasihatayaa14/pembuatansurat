<?php
session_start();
include "koneksi.php"; // Pastikan koneksi.php sudah benar

$username = $_POST['username'] ?? ''; // Tangkap input username (nama kolom di form HTML)
$password = $_POST['password'] ?? ''; // Tangkap input password

// --- BARIS YANG DIPERBAIKI ---
// Ganti '$input_username' menjadi '$username'
// Ganti '$input_password' menjadi '$password'
// Ganti 'username' menjadi 'nama' (sudah diperbaiki di diskusi sebelumnya)

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE nama='$username' AND password='$password'");

$cek = mysqli_num_rows($query);
$data_admin = mysqli_fetch_assoc($query); // Ambil data admin jika berhasil

if ($cek > 0) {
    // LOGIN BERHASIL
    $_SESSION['nama'] = $data_admin['nama']; // Simpan nama admin
    $_SESSION['level'] = "admin"; // Simpan level/role jika perlu
    $_SESSION['status'] = "login"; // Penting untuk cek status login di halaman lain
    
    // Alihkan ke halaman dashboard
    header("Location: dashboard.php"); // Ganti 'dashboard.php' dengan nama file dashboard Anda
    exit;
} else {
    // LOGIN GAGAL
    // Alihkan kembali ke halaman login dengan pesan gagal
    header("Location: login.php?pesan=gagal");
    exit;
}
?>