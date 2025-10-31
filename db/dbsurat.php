<?php
include "../koneksi.php";

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

if ($proses == 'hapus') {
    $idsurat = $_GET['idsurat'];

    // Cek data lama
    $query = mysqli_query($koneksi, "SELECT * FROM surat WHERE idsurat='$idsurat'");
    $data = mysqli_fetch_assoc($query);

    // Hapus file foto
    if (file_exists("../file_surat/" . $data['fotosurat']) && $data['fotosurat'] != "") {
        unlink("../file_surat/" . $data['fotosurat']);
    }

    // Hapus dari database
    $hapus = mysqli_query($koneksi, "DELETE FROM surat WHERE idsurat='$idsurat'");

    if ($hapus) {
        echo "<script>alert('Surat berhasil dihapus!'); window.location='../index.php?halaman=surat';</script>";
    } else {
        echo "<script>alert('Gagal menghapus surat!'); window.location='../index.php?halaman=surat';</script>";
    }
}
?>
