<?php
include "koneksi.php";
$no = 1;

// Query ambil data kategori
$sql = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h4 class="m-0 text-light">
          <i class="fas fa-folder-open me-2"></i> Data Kategori Surat
        </h4>
      </div>
      <div class="col-sm-6 text-right">
        <ol class="breadcrumb float-sm-right mb-0">
          <li class="breadcrumb-item"><a href="index.php" class="text-primary">Home</a></li>
          <li class="breadcrumb-item active text-light">Kategori Surat</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="card shadow-sm border-0">

    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="m-0"><i class="fas fa-tags me-2"></i> Daftar Kategori Surat</h5>
      <a href="index.php?halaman=tambahkategori" class="btn btn-light btn-sm text-primary fw-bold">
        <i class="fas fa-plus"></i> Tambah Kategori
      </a>
    </div>

    <div class="card-body p-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-sm text-light mb-0">
          <thead class="bg-primary text-white text-center">
            <tr>
              <th style="width: 60px;">No</th>
              <th>Nama Kategori</th>
              <th style="width: 120px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!$sql) {
              echo "<tr><td colspan='3' class='text-center text-danger'>Query Error: " . mysqli_error($koneksi) . "</td></tr>";
            } else {
              if (mysqli_num_rows($sql) == 0) {
                echo "<tr><td colspan='3' class='text-center text-muted'>Belum ada data kategori surat.</td></tr>";
              } else {
                while ($data = mysqli_fetch_array($sql)) {
                  echo "
                    <tr>
                      <td class='text-center'>$no</td>
                      <td>" . htmlspecialchars($data['nama_kategori']) . "</td>
                      <td class='text-center'>
                        <a href='index.php?halaman=editkategori&id_kategori={$data['id_kategori']}' class='btn btn-sm btn-warning'>
                          <i class='fa fa-edit'></i>
                        </a>
                        <a href='db/dbkategori.php?proses=hapus&id_kategori={$data['id_kategori']}' 
                           class='btn btn-sm btn-danger'
                           onclick=\"return confirm('Yakin ingin menghapus kategori: " . htmlspecialchars($data['nama_kategori']) . "?');\">
                           <i class='fa fa-trash'></i>
                        </a>
                      </td>
                    </tr>";
                  $no++;
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer text-muted text-sm">
      <i class="fas fa-info-circle me-1"></i> Menampilkan daftar kategori surat yang sudah terdaftar.
    </div>

  </div>
</section>
