<?php
include "koneksi.php"; 

// Ambil semua data pegawai
$query = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama ASC");
?>

<div class="card card-solid border-0 shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
        <h4 class="mb-0">
            <i class="fas fa-users me-2"></i> Data Pegawai
        </h4>
        <a href="index.php?halaman=tambahpegawai" 
           class="btn btn-light btn-sm fw-semibold shadow-sm d-flex align-items-center"
           style="border-radius: 25px; padding: 6px 14px;">
            <i class="fas fa-user-plus me-2 text-primary"></i> Tambah Pegawai
        </a>
    </div>

    <div class="card-body pb-0 bg-light">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>ID Pegawai</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th style="width: 140px;">Aksi</th>
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
                                <td><?= htmlspecialchars($data['idpegawai']); ?></td>
                                <td><?= htmlspecialchars($data['nama']); ?></td>
                                <td><?= htmlspecialchars($data['jabatan']); ?></td>
                                <td class="text-start">
                                    <?= htmlspecialchars(substr($data['alamat'], 0, 40)) . (strlen($data['alamat']) > 40 ? '...' : ''); ?>
                                </td>
                                <td><?= htmlspecialchars($data['nohp']); ?></td>
                                <td><?= htmlspecialchars($data['email']); ?></td>
                                <td>
                                    <?php if (!empty($data['fotopegawai'])) { ?>
                                        <img src="assets/foto_pegawai/<?= htmlspecialchars($data['fotopegawai']); ?>" 
                                             alt="Foto Pegawai" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                    <?php } else { ?>
                                        <span class="text-muted">N/A</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="index.php?halaman=editpegawai&idpegawai=<?= $data['idpegawai']; ?>" 
                                           class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                           title="Edit Pegawai">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="db/dbpegawai.php?proses=hapus&idpegawai=<?= $data['idpegawai']; ?>" 
                                           class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                           title="Hapus Pegawai"
                                           onclick="return confirm('Yakin ingin menghapus data pegawai ini? Semua relasi akan ikut terhapus!')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center text-muted'>Belum ada data pegawai</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer text-sm text-muted text-end">
        <em>Daftar lengkap data pegawai yang tercatat dalam sistem.</em>
    </div>
</div>
