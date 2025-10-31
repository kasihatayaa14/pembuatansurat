<?php
include "koneksi.php";

// Ambil ID admin dari URL
$idadmin = isset($_GET['idadmin']) ? $_GET['idadmin'] : '';

if ($idadmin == '') {
    echo "<script>alert('ID admin tidak ditemukan!'); window.location='index.php?halaman=admin';</script>";
    exit;
}

// Ambil data admin dari database
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin='$idadmin'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data admin tidak ditemukan!'); window.location='index.php?halaman=admin';</script>";
    exit;
}
?>

<div class="card card-primary shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title"><i class="fas fa-user-edit"></i> Edit Data Admin</h3>
    </div>

    <form action="db/dbadmin.php?proses=edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idadmin" value="<?= $data['idadmin']; ?>">

        <div class="card-body">
            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Admin</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $data['password']; ?>" required>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto Admin</label><br>
                        <?php if (!empty($data['fotoadmin'])) { ?>
                            <img src="uploads/<?= $data['fotoadmin']; ?>" width="100" height="100" class="img-thumbnail mb-2" alt="Foto Admin">
                        <?php } else { ?>
                            <p><i>Tidak ada foto</i></p>
                        <?php } ?>
                        <input type="file" name="fotoadmin" class="form-control-file">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="index.php?halaman=admin" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary" name="update">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
