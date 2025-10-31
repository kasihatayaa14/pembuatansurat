<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include "../koneksi.php";

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

// Gunakan mysqli_real_escape_string untuk keamanan minimal
$koneksi = $koneksi; // Asumsi $koneksi adalah koneksi database dari file koneksi.php

if ($proses == 'tambah') {

    // Ambil dan bersihkan data POST
    $idpenyuratan  = mysqli_real_escape_string($koneksi, $_POST['idpenyuratan']);
    $idadmin   = mysqli_real_escape_string($koneksi, $_POST['idadmin']);
    $idsurat     = mysqli_real_escape_string($koneksi, $_POST['idsurat']);
    $idpegawai   = mysqli_real_escape_string($koneksi, $_POST['idpegawai']);
    $jenissurat    = mysqli_real_escape_string($koneksi, $_POST['jenissurat']);
    $status  = mysqli_real_escape_string($koneksi, $_POST['status']);
    $tanggalproses   = mysqli_real_escape_string($koneksi, $_POST['tanggalproses']);
    
    // --- PERBAIKAN: Menambahkan variabel yang hilang pada query INSERT ---
    // ASUMSI: Variabel ini seharusnya juga ada di form POST
    $tgl_surat = isset($_POST['tgl_surat']) ? mysqli_real_escape_string($koneksi, $_POST['tgl_surat']) : NULL;
    $perihal = isset($_POST['perihal']) ? mysqli_real_escape_string($koneksi, $_POST['perihal']) : NULL;
    $keterangan = isset($_POST['keterangan']) ? mysqli_real_escape_string($koneksi, $_POST['keterangan']) : NULL;
    // ---------------------------------------------------------------------

    // Cek validitas relasi (Gunakan data yang sudah di-escape)
    $cek_pegawai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE idpegawai='$idpegawai'"));
    $cek_surat   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM surat WHERE idsurat='$idsurat'"));

    if ($cek_pegawai == 0) {
        die("Error: Pegawai dengan ID $idpegawai tidak ditemukan di tabel pegawai!");
    }
    if ($cek_surat == 0) {
        die("Error: Surat dengan ID $idsurat tidak ditemukan di tabel surat!");
    }

    // Simpan data ke tabel penyuratan
    $query = "INSERT INTO penyuratan (idpegawai, idsurat, tgl_surat, perihal, keterangan)
              VALUES ('$idpegawai', '$idsurat', '$tgl_surat', '$perihal', '$keterangan')";
    
    mysqli_query($koneksi, $query) or die("Gagal menyimpan data: " . mysqli_error($koneksi));

    header("Location: ../index.php?halaman=penyuratan");
    exit;
    
} elseif ($proses == 'edit') {

    if (!isset($_POST['idpenyuratan'])) {
        die("Error: idpenyuratan tidak ditemukan di form edit!");
    }

    // Ambil dan bersihkan data POST
    $idpenyuratan  = mysqli_real_escape_string($koneksi, $_POST['idpenyuratan']);
    $idadmin   = mysqli_real_escape_string($koneksi, $_POST['idadmin']);
    $idsurat     = mysqli_real_escape_string($koneksi, $_POST['idsurat']);
    $idpegawai   = mysqli_real_escape_string($koneksi, $_POST['idpegawai']);
    $jenissurat    = mysqli_real_escape_string($koneksi, $_POST['jenissurat']);
    $status  = mysqli_real_escape_string($koneksi, $_POST['status']);
    $tanggalproses   = mysqli_real_escape_string($koneksi, $_POST['tanggalproses']);


    // Cek validitas relasi (Gunakan data yang sudah di-escape)
    $cek_pegawai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE idpegawai='$idpegawai'"));
    $cek_surat   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM surat WHERE idsurat='$idsurat'"));

    if ($cek_pegawai == 0) {
        die("Error: Pegawai dengan ID $idpegawai tidak ditemukan!");
    }
    if ($cek_surat == 0) {
        die("Error: Surat dengan ID $idsurat tidak ditemukan!");
    }

    // Update data
    // --- PERBAIKAN: Menambahkan koma (,) setelah setiap kolom yang di-update ---
    $query = "UPDATE penyuratan SET 
                idpenyuratan='$idpenyuratan',
                idadmin='$idadmin',
                idsurat='$idsurat',
                idpegawai='$idpegawai',
                jenissurat='$jenissurat',
                status='$status',
                tanggalproses='$tanggalproses'
              WHERE idpenyuratan='$idpenyuratan'";
              
    mysqli_query($koneksi, $query) or die("Gagal mengupdate data: " . mysqli_error($koneksi));

    header("Location: ../index.php?halaman=penyuratan");
    exit;
    
} elseif ($proses == 'hapus') {

    if (!isset($_GET['idpenyuratan'])) {
        die("Error: idpenyuratan tidak ditemukan!");
    }

    // Ambil dan bersihkan data GET
    $idpenyuratan = mysqli_real_escape_string($koneksi, $_GET['idpenyuratan']);

    // Hapus data penyuratan
    mysqli_query($koneksi, "DELETE FROM penyuratan WHERE idpenyuratan='$idpenyuratan'")
        or die("Gagal menghapus data: " . mysqli_error($koneksi));

    echo "<script>
            alert('Data penyuratan berhasil dihapus!');
            window.location='../index.php?halaman=penyuratan';
          </script>";
          
} else {
    die("Error: proses tidak dikenali!");
}