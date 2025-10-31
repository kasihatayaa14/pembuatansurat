<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $tanggalsurat = $_POST['tanggalsurat'];
    $perihal = $_POST['perihal'];
    $isisurat = $_POST['isisurat'];
    $nosurat = $_POST['nosurat'];

    // Proses upload foto
    $fotosurat = "";
    if (!empty($_FILES['fotosurat']['name'])) {
        $fotosurat = time() . "_" . $_FILES['fotosurat']['name'];
        move_uploaded_file($_FILES['fotosurat']['tmp_name'], "file_surat/" . $fotosurat);
    }

    $query = mysqli_query($koneksi, "INSERT INTO surat (tanggalsurat, perihal, isisurat, nosurat, fotosurat)
                                     VALUES ('$tanggalsurat','$perihal','$isisurat','$nosurat','$fotosurat')");

    if ($query) {
        echo "<script>alert('Surat berhasil ditambahkan!'); window.location='index.php?halaman=surat';</script>";
    } else {
        echo "<script>alert('Gagal menambah surat!');</script>";
    }
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-plus-circle"></i> Tambah Surat</h3>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggalsurat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <input type="text" name="perihal" class="form-control" placeholder="Masukkan perihal surat" required>
            </div>
            <div class="form-group">
                <label>Isi Surat</label>
                <textarea name="isisurat" class="form-control" rows="3" placeholder="Masukkan isi surat" required></textarea>
            </div>
            <div class="form-group">
                <label>No Surat</label>
                <input type="text" name="nosurat" class="form-control" placeholder="Masukkan nomor surat" required>
            </div>
            <div class="form-group">
                <label>Foto Surat (Opsional)</label>
                <input type="file" name="fotosurat" class="form-control">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="index.php?halaman=surat" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>
