<?php
// Pastikan koneksi.php tersedia dan berfungsi
include "koneksi.php"; 

// Query untuk mengambil semua data dari tabel penyuratan
$query = mysqli_query($koneksi, "SELECT * FROM penyuratan ORDER BY tanggalproses DESC");
?>

<div class="card card-solid">
    <div class="col">
        <a href="index.php?halaman=tambahpenyuratan" class="btn btn-primary float-right btn-sm mt-3">
            <i class="fas fa-plus-circle"></i> Tambah Proses
        </a>
    </div>

    <div class="card-body pb-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penyuratan</th>
                        <th>ID Admin</th>
                        <th>ID Surat</th>
                        <th>ID Pegawai</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th>Tanggal Proses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Lakukan perulangan untuk menampilkan data
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
                                <a href="index.php?halaman=editpenyuratan&idpenyuratan=<?= $data['idpenyuratan']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="db/dbpenyuratan.php?proses=hapus&idpenyuratan=<?= $data['idpenyuratan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>