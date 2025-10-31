<?php
include "koneksi.php"; // koneksi database

// Ambil id penyuratan dari URL (asumsi: idpenyuratan adalah primary key)
$id_penyuratan = $_GET['idpenyuratan'] ?? null;

// Validasi parameter
if (!$id_penyuratan) {
    echo "<div class='alert alert-danger'>ID Penyuratan tidak ditemukan!</div>";
    exit();
}

// Ambil data penyuratan dari database
$sql = mysqli_query($koneksi, "SELECT * FROM penyuratan WHERE idpenyuratan='$id_penyuratan'");
$data = mysqli_fetch_assoc($sql);

// Jika data tidak ditemukan
if (!$data) {
    echo "<div class='alert alert-danger'>Data proses penyuratan tidak ditemukan!</div>";
    exit();
}
?>

<section class="content">

    <div class="card text-sm">
        <div class="card-header bg-gradient-warning">
            <h2 class="card-title text-white">Edit Proses Penyuratan: **ID #<?php echo htmlspecialchars($data['idpenyuratan']); ?>**</h2>
        </div>

        <div class="card-body">
            <div class="card card-warning">
                <form action="db/dbpenyuratan.php?proses=edit" method="POST">
                    <div class="card-body-sm ml-2">

                        <input type="hidden" name="idpenyuratan" value="<?php echo $data['idpenyuratan']; ?>">

                        <div class="form-group">
                            <label for="idadmin">ID Admin (Petugas)</label>
                            <input type="text" class="form-control" id="idadmin" name="idadmin"
                                value="<?php echo htmlspecialchars($data['idadmin']); ?>"
                                placeholder="Masukkan ID Admin yang memproses" required>
                        </div>

                        <div class="form-group">
                            <label for="idsurat">ID Surat</label>
                            <input type="text" class="form-control" id="idsurat" name="idsurat"
                                value="<?php echo htmlspecialchars($data['idsurat']); ?>"
                                placeholder="Masukkan ID Surat yang diproses" required>
                        </div>

                        <div class="form-group">
                            <label for="idpegawai">ID Pegawai</label>
                            <input type="text" class="form-control" id="idpegawai" name="idpegawai"
                                value="<?php echo htmlspecialchars($data['idpegawai']); ?>"
                                placeholder="Masukkan ID Pegawai yang terlibat" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="jenissurat">Jenis Surat</label>
                            <input type="text" class="form-control" id="jenissurat" name="jenissurat"
                                value="<?php echo htmlspecialchars($data['jenissurat']); ?>"
                                placeholder="Masukkan Jenis Surat" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status Proses</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Pending" <?php echo ($data['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="Diproses" <?php echo ($data['status'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                                <option value="Selesai" <?php echo ($data['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                                <option value="Ditolak" <?php echo ($data['status'] == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggalproses">Tanggal Proses</label>
                            <input type="date" class="form-control" id="tanggalproses" name="tanggalproses"
                                value="<?php echo htmlspecialchars(date('Y-m-d', strtotime($data['tanggalproses']))); ?>" required>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning float-right ml-3">
                                <i class="fa fa-edit"></i> **Update Proses**
                            </button>
                            <a href="index.php?halaman=penyuratan" class="btn btn-secondary float-right">
                                <i class="fa fa-arrow-left"></i> Batal
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="card-footer text-sm text-muted">
            Formulir untuk memperbarui status dan detail proses penyuratan.
        </div>
    </div>

</section>