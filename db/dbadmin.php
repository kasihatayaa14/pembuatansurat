<?php
include "../koneksi.php";
session_start();

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

if ($proses == 'tambah') {
    // Ambil data dari form tambah admin
    $nama      = $_POST['nama'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];

    // Upload foto jika ada
    $fotoadmin = '';
    if (!empty($_FILES['fotoadmin']['name'])) {
        $fotoadmin = basename($_FILES['fotoadmin']['name']);
        $target = "../uploads/" . $fotoadmin;
        move_uploaded_file($_FILES['fotoadmin']['tmp_name'], $target);
    }

    $query = "INSERT INTO admin (nama, email, password, fotoadmin) 
              VALUES ('$nama', '$email', '$password', '$fotoadmin')";
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>alert('Data admin berhasil ditambahkan'); 
        window.location='../index.php?halaman=admin';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan admin!'); 
        window.location='../index.php?halaman=tambahadmin';</script>";
    }
}

// PROSES EDIT ADMIN
elseif ($proses == 'edit') {
    $idadmin   = $_POST['idadmin'];
    $nama      = $_POST['nama'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];

    // Jika user upload foto baru
    if (!empty($_FILES['fotoadmin']['name'])) {
        $fotoadmin = basename($_FILES['fotoadmin']['name']);
        $target = "../uploads/" . $fotoadmin;
        move_uploaded_file($_FILES['fotoadmin']['tmp_name'], $target);

        $query = "UPDATE admin SET 
                    nama='$nama',
                    email='$email',
                    password='$password',
                    fotoadmin='$fotoadmin'
                  WHERE idadmin='$idadmin'";
    } else {
        // Jika tidak upload foto
        $query = "UPDATE admin SET 
                    nama='$nama',
                    email='$email',
                    password='$password'
                  WHERE idadmin='$idadmin'";
    }

    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data admin berhasil diperbarui'); 
        window.location='../index.php?halaman=admin';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data admin!'); 
        window.location='../index.php?halaman=editadmin&idadmin=$idadmin';</script>";
    }
}

// PROSES HAPUS ADMIN
elseif ($proses == 'hapus') {
    $idadmin = $_GET['idadmin'];

    // Hapus foto dari folder jika ada
    $getFoto = mysqli_query($koneksi, "SELECT fotoadmin FROM admin WHERE idadmin='$idadmin'");
    $dataFoto = mysqli_fetch_assoc($getFoto);
    if (!empty($dataFoto['fotoadmin']) && file_exists("../uploads/" . $dataFoto['fotoadmin'])) {
        unlink("../uploads/" . $dataFoto['fotoadmin']);
    }

    $hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE idadmin='$idadmin'");

    if ($hapus) {
        echo "<script>alert('Data admin berhasil dihapus'); 
        window.location='../index.php?halaman=admin';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data admin!'); 
        window.location='../index.php?halaman=admin';</script>";
    }
}

else {
    echo "<script>alert('Proses tidak dikenali'); 
    window.location='../index.php?halaman=admin';</script>";
}
?>
