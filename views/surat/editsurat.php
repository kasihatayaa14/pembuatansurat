<?php
include "koneksi.php";

$idsurat = $_GET['idsurat'];
$query = mysqli_query($koneksi, "SELECT * FROM surat WHERE idsurat='$idsurat'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $tanggalsurat = $_POST['tanggalsurat'];
    $perihal = $_POST['perihal'];
    $isisurat = $_POST['isisurat'];
    $nosurat = $_POST['nosurat'];
    $fotosurat = $data['fotosurat'];

    if (!empty($_FILES['fotosurat']['name'])) {
        if (file_exists("file_surat/" . $data['fotosurat']) && $data['fotosurat'] != "") {
            unlink("file_surat/" . $data['fotosurat']);
        }
        $fotosurat = time() . "_" . $_FILES['fotosurat']['name'];
        move_uploaded_file($_FILES['fotosurat']['tmp_name'], "file_surat/" . $fotosurat);
    }

    $update = mysqli_query($koneksi, "UPDATE surat SET tanggalsurat='$tanggalsurat', perihal='$perihal',
                      isisurat='$isisurat', nosurat='$nosurat', fotosurat='$fotosurat' WHERE idsurat='$idsurat'");

    if ($update) {
        echo "<script>alert('Data surat berhasil diperbarui!'); window.location='index.php?halaman=surat';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data surat!');</script>";
    }
}
?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> Edit Surat</h3>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" name="tanggalsurat" value="<?= $data['tanggalsurat']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <input type="text" name="perihal" value="<?= $data['perihal']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Isi Surat</label>
                <textarea name="isisurat" class="form-control" rows="3" required><?= $data['isisurat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>No Surat</label>
                <input type="text" name="nosurat" value="<?= $data['nosurat']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Foto Surat Saat Ini</label><br>
                <?php if (!empty($data['fotosurat'])) { ?>
                    <img src="file_surat/<?= $data['fotosurat']; ?>" width="120" class="img-thumbnail mb-2">
                <?php } else { ?>
                    <p class="text-muted">Tidak ada foto</p>
                <?php } ?>
                <input type="file" name="fotosurat" class="form-control">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" name="update" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
            <a href="index.php?halaman=surat" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>
