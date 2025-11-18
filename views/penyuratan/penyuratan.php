<?php
include "koneksi.php"; 

// Query untuk mengambil semua data dari tabel penyuratan
$query = mysqli_query($koneksi, "SELECT * FROM penyuratan ORDER BY tanggalproses DESC");
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0 d-flex align-items-center">
            <i class="fas fa-file-alt me-2"></i> Data Penyuratan
        </h4>
        <a href="index.php?halaman=tambahpenyuratan" 
           class="btn btn-light btn-sm fw-bold d-flex align-items-center shadow-sm px-3 py-2 rounded-pill">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            <span class="text-primary">Tambah Penyuratan</span>
        </a>
    </div>

    <div class="card-body bg-light pb-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>ID Penyuratan</th>
                        <th>ID Admin</th>
                        <th>ID Surat</th>
                        <th>ID Pegawai</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th>Tanggal Proses</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($data['idpenyuratan']); ?></td>
                                <td><?= htmlspecialchars($data['idadmin']); ?></td>
                                <td><?= htmlspecialchars($data['idsurat']); ?></td>
                                <td><?= htmlspecialchars($data['idpegawai']); ?></td>
                                <td><?= htmlspecialchars($data['jenissurat']); ?></td>
                                <td><?= htmlspecialchars($data['status']); ?></td>
                                <td><?= htmlspecialchars($data['tanggalproses']); ?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="index.php?halaman=editpenyuratan&idpenyuratan=<?= $data['idpenyuratan']; ?>" 
                                           class="btn btn-warning btn-sm" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="db/dbpenyuratan.php?proses=hapus&idpenyuratan=<?= $data['idpenyuratan']; ?>" 
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Yakin ingin hapus data ini?')"
                                           title="Hapus Data">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center text-muted'>Belum ada data penyuratan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
