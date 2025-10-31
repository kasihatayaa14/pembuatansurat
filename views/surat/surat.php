<?php
include "koneksi.php";

// Ambil data dari tabel surat
$query = mysqli_query($koneksi, "SELECT * FROM surat ORDER BY tanggalsurat DESC");
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top">
        <h4 class="mb-0">
            <i class="fas fa-envelope-open-text me-2"></i> Data Surat
        </h4>
        <a href="index.php?halaman=tambahsurat" class="btn btn-light btn-sm fw-bold shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Tambah Surat
        </a>
    </div>

    <div class="card-body bg-light">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>ID Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Perihal</th>
                        <th>Isi Surat</th>
                        <th>No Surat</th>
                        <th>Foto Surat</th>
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
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= htmlspecialchars($data['idsurat']); ?></td>
                                <td><?= htmlspecialchars($data['tanggalsurat']); ?></td>
                                <td><?= htmlspecialchars($data['perihal']); ?></td>
                                <td><?= htmlspecialchars($data['isisurat']); ?></td>
                                <td><?= htmlspecialchars($data['nosurat']); ?></td>
                                <td>
                                    <?php if (!empty($data['fotosurat'])) { ?>
                                        <img src="uploads/<?= htmlspecialchars($data['fotosurat']); ?>" alt="Foto Surat" width="70" class="rounded shadow-sm">
                                    <?php } else { ?>
                                        <span class="text-muted">Tidak ada</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?halaman=editsurat&idsurat=<?= $data['idsurat']; ?>" class="btn btn-warning btn-sm me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="db/dbsurat.php?proses=hapus&idsurat=<?= $data['idsurat']; ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus surat ini?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center text-muted'>Belum ada data surat</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
