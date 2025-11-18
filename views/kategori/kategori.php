<?php
include "koneksi.php";
$no = 1;

// Query ambil data kategori
$sql = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>

<section class="content">
  <div class="card shadow-sm border-0">

    <!-- HEADER BERGAYA BIRU DENGAN TOMBOL PUTIH -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded">
      <h4 class="mb-0 d-flex align-items-center">
        <i class="fas fa-folder-open me-2"></i> Data Kategori Surat
      </h4>
      <a href="index.php?halaman=tambahkategori"
         class="btn btn-light fw-bold d-flex align-items-center px-3 py-2 rounded-pill shadow-sm">
        <i class="fas fa-plus-circle text-primary me-2"></i>
        <span class="text-primary">Tambah Kategori</span>
      </a>
    </div>

    <!-- ISI TABEL -->
    <div class="card-body bg-light p-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
          <thead class="table-primary text-white">
            <tr>
              <th style="width: 60px;">No</th>
              <th>Nama Kategori</th>
              <th style="width: 150px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!$sql) {
              echo "<tr><td colspan='3' class='text-center text-danger'>Query Error: " . mysqli_error($koneksi) . "</td></tr>";
            } elseif (mysqli_num_rows($sql) == 0) {
              echo "<tr><td colspan='3' class='text-center text-muted'>Belum ada data kategori surat.</td></tr>";
            } else {
              while ($data = mysqli_fetch_array($sql)) {
                echo "
                  <tr>
                    <td>{$no}</td>
                    <td>" . htmlspecialchars($data['nama_kategori']) . "</td>
                    <td>
                      <div class='d-flex justify-content-center gap-2'>
                        <a href='index.php?halaman=editkategori&id_kategori={$data['id_kategori']}' 
                           class='btn btn-warning btn-sm'>
                           <i class='fa fa-edit'></i>
                        </a>
                        <a href='db/dbkategori.php?proses=hapus&id_kategori={$data['id_kategori']}' 
                           class='btn btn-danger btn-sm'
                           onclick=\"return confirm('Yakin ingin menghapus kategori: " . htmlspecialchars($data['nama_kategori']) . "?');\">
                           <i class='fa fa-trash'></i>
                        </a>
                      </div>
                    </td>
                  </tr>";
                $no++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer text-muted small">
      <i class="fas fa-info-circle me-1"></i> Menampilkan daftar kategori surat yang sudah terdaftar.
    </div>

  </div>
</section>
