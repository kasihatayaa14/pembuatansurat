<?php
// ============================================
// File: views/kategori/tambahkategori.php
// Aplikasi: Pembuatan Surat
// ============================================

// Tampilkan pesan error jika ada
$pesan_error = '';
if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
    $pesan_error = "<div class='alert alert-danger'>Gagal menyimpan data kategori: " . htmlspecialchars($_GET['error'] ?? 'Terjadi kesalahan.') . "</div>";
}
?>

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h4 class="m-0 font-weight-bold text-dark">
          <i class="fas fa-plus-circle me-2"></i> Tambah Kategori Surat
        </h4>
      </div>
      <div class="col-sm-6 text-right">
        <ol class="breadcrumb float-sm-right mb-0">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?halaman=kategori">Kategori</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="card card-solid shadow-sm border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h5 class="m-0"><i class="fas fa-tags me-2"></i> Tambah Data Kategori Surat</h5>
      <a href="index.php?halaman=kategori" class="btn btn-light btn-sm">
        <i class="fas fa-list"></i> Lihat Data
      </a>
    </div>

    <div class="card-body">
      <?= $pesan_error ?>

      <form action="db/dbkategori.php?proses=tambah" method="POST" class="mt-2">

        <div class="form-group mb-3">
          <label for="nama_kategori">Nama Kategori</label>
          <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                 placeholder="Contoh: Surat Masuk, Surat Keluar, Undangan" required>
          <small class="text-muted">Masukkan nama kategori surat baru.</small>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <a href="index.php?halaman=kategori" class="btn btn-secondary btn-sm me-2">
            <i class="fa fa-undo"></i> Batal
          </a>
          <button type="submit" class="btn btn-success btn-sm">
            <i class="fa fa-save"></i> Simpan Data
          </button>
        </div>
      </form>
    </div>

    <div class="card-footer text-muted text-sm">
      <i class="fas fa-info-circle me-1"></i> Formulir ini digunakan untuk menambahkan kategori surat baru ke sistem.
    </div>
  </div>
</section>
