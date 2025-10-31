<?php
include "../koneksi.php";

$proses = isset($_GET['proses']) ? $_GET['proses'] : '';

if ($proses == 'edit') {
    // Ambil data dari form
    $idpegawai   = $_POST['idpegawai'];
    $nama        = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan     = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $alamat      = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nohp        = mysqli_real_escape_string($koneksi, $_POST['nohp']);
    $email       = mysqli_real_escape_string($koneksi, $_POST['email']);

    // Cek upload foto baru
    $fotoBaru = $_FILES['fotopegawai']['name'];
    $tmpFoto  = $_FILES['fotopegawai']['tmp_name'];

    if (!empty($fotoBaru)) {
        // Simpan file baru
        $namaFileBaru = time() . "_" . basename($fotoBaru);
        $tujuan = "../assets/foto_pegawai/" . $namaFileBaru;

        if (move_uploaded_file($tmpFoto, $tujuan)) {
            // Hapus foto lama jika ada
            $query_foto = mysqli_query($koneksi, "SELECT fotopegawai FROM pegawai WHERE idpegawai='$idpegawai'");
            $data_foto = mysqli_fetch_assoc($query_foto);
            if (!empty($data_foto['fotopegawai']) && file_exists("../assets/foto_pegawai/" . $data_foto['fotopegawai'])) {
                unlink("../assets/foto_pegawai/" . $data_foto['fotopegawai']);
            }

            $update = mysqli_query($koneksi, "
                UPDATE pegawai 
                SET nama='$nama',
                    jabatan='$jabatan',
                    alamat='$alamat',
                    nohp='$nohp',
                    email='$email',
                    fotopegawai='$namaFileBaru'
                WHERE idpegawai='$idpegawai'
            ");
        } else {
            echo "<script>alert('Gagal mengupload foto baru!'); history.back();</script>";
            exit();
        }
    } else {
        // Update tanpa ganti foto
        $update = mysqli_query($koneksi, "
            UPDATE pegawai 
            SET nama='$nama',
                jabatan='$jabatan',
                alamat='$alamat',
                nohp='$nohp',
                email='$email'
            WHERE idpegawai='$idpegawai'
        ");
    }

    // Cek hasil update
    if ($update) {
        echo "<script>alert('Data pegawai berhasil diperbarui!'); window.location='../index.php?halaman=pegawai';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data pegawai: " . mysqli_error($koneksi) . "'); history.back();</script>";
    }

} else if ($proses == 'hapus') {
    $idpegawai = $_GET['idpegawai'];

    // Hapus foto
    $q_foto = mysqli_query($koneksi, "SELECT fotopegawai FROM pegawai WHERE idpegawai='$idpegawai'");
    $d_foto = mysqli_fetch_assoc($q_foto);
    if (!empty($d_foto['fotopegawai']) && file_exists("../assets/foto_pegawai/" . $d_foto['fotopegawai'])) {
        unlink("../assets/foto_pegawai/" . $d_foto['fotopegawai']);
    }

    // Hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM pegawai WHERE idpegawai='$idpegawai'");

    if ($hapus) {
        echo "<script>alert('Data pegawai berhasil dihapus!'); window.location='../index.php?halaman=pegawai';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data pegawai: " . mysqli_error($koneksi) . "'); history.back();</script>";
    }
}
?>
