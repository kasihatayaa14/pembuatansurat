<?php
// Pastikan koneksi.php tersedia dan berfungsi
include "koneksi.php"; 

// Query untuk mengambil semua data dari tabel pegawai
// Menggunakan 'nama' untuk nama kolom nama pegawai
$query = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama ASC");
?>

<div class="card card-solid">
    <div class="col">
        <a href="index.php?halaman=tambahpegawai" class="btn btn-primary float-right btn-sm mt-3">
            <i class="fas fa-user-plus"></i> Tambah Pegawai
        </a>
    </div>

    <div class="card-body pb-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pegawai</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Foto</th>
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
                            <td><?= htmlspecialchars($data['idpegawai']); ?></td>
                            <td><?= htmlspecialchars($data['nama']); ?></td>
                            <td><?= htmlspecialchars($data['jabatan']); ?></td>
                            
                            <td class="text-left">
                                <?= htmlspecialchars(substr($data['alamat'], 0, 40)) . (strlen($data['alamat']) > 40 ? '...' : ''); ?>
                            </td>
                            
                            <td><?= htmlspecialchars($data['nohp']); ?></td>
                            <td><?= htmlspecialchars($data['email']); ?></td>
                            
                            <td>
                                <?php if (!empty($data['fotopegawai'])) { ?>
                                    <img src="assets/foto_pegawai/<?= htmlspecialchars($data['fotopegawai']); ?>" 
                                         alt="Foto Pegawai" 
                                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                <?php } else { ?>
                                    <span class="text-muted">N/A</span>
                                <?php } ?>
                            </td>
                            
                            <td>
                                <a href="index.php?halaman=editpegawai&idpegawai=<?= $data['idpegawai']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="db/dbpegawai.php?proses=hapus&idpegawai=<?= $data['idpegawai']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data pegawai ini? Semua relasi akan ikut terhapus!')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-sm text-muted">
        Daftar lengkap data pegawai yang tercatat dalam sistem.
    </div>
</div>