<?php
include "koneksi.php";

// Proses tambah admin
if (isset($_POST['simpan'])) {
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $password   = md5($_POST['password']); // gunakan md5 untuk enkripsi sederhana
    $nohp       = $_POST['nohp'];
    $alamat     = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO admin (nama, username, password, nohp, alamat) VALUES ('$nama', '$username', '$password', '$nohp', '$alamat')");

    if ($query) {
        echo "<script>alert('Admin berhasil ditambahkan!');window.location='index.php?halaman=admin';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan admin.');window.location='index.php?halaman=tambahadmin';</script>";
    }
}
?>

<!-- Form Tambah Admin -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus"></i> Tambah Admin</h3>
    </div>

    <form method="POST" action="">
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <div class="form-group">
                <label for="nohp">No. HP</label>
                <input type="text" name="nohp" class="form-control" placeholder="Masukkan nomor HP" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" name="simpan" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="index.php?halaman=admin" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
