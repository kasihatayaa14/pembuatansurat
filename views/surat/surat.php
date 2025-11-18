<?php
include "koneksi.php";

// Ambil data dari tabel surat
$query = mysqli_query($koneksi, "SELECT * FROM surat ORDER BY tanggalsurat DESC");
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0 d-flex align-items-center">
            <i class="fas fa-envelope-open-text me-2"></i> Data Surat
        </h4>
        <a href="index.php?halaman=tambahsurat" 
           class="btn btn-light btn-sm fw-bold d-flex align-items-center shadow-sm px-3 py-2 rounded-pill">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            <span class="text-primary">Tambah Surat</span>
        </a>
    </div>

    <div class="card-body bg-light">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>ID Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Perihal</th>
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
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($data['idsurat']); ?></td>
                                <td><?= htmlspecialchars($data['tanggalsurat']); ?></td>
                                <td class="text-start"><?= htmlspecialchars($data['perihal']); ?></td>
                                <td><?= htmlspecialchars($data['nosurat']); ?></td>
                                <td>
                                    <?php if (!empty($data['fotosurat'])) { ?>
                                        <img src="uploads/<?= htmlspecialchars($data['fotosurat']); ?>" 
                                             alt="Foto Surat" 
                                             width="60" height="60"
                                             class="rounded shadow-sm object-fit-cover">
                                    <?php } else { ?>
                                        <span class="text-muted">Tidak ada</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="index.php?halaman=editsurat&idsurat=<?= $data['idsurat']; ?>" 
                                           class="btn btn-warning btn-sm" title="Edit Surat">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="db/dbsurat.php?proses=hapus&idsurat=<?= $data['idsurat']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus surat ini?');"
                                           title="Hapus Surat">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>Belum ada data surat</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
