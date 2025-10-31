<?php
// ============================================
// File: views/kategori/editkategori.php
// Aplikasi: Pembuatan Surat
// ============================================

// Pastikan koneksi database aktif
include "koneksi.php";

// Ambil ID dari URL dan pastikan valid
$id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : '';
if (empty($id_kategori)) {
    echo "<div class='alert alert-danger'>ID Kategori tidak ditemukan.</div>";
    exit();
}

// Ambil data kategori dari database
$sql = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$data = mysqli_fetch_assoc($sql);

if (!$data) {
    echo "<div class='alert alert-danger'>Data kategori tidak ditemukan!</div>";
    exit();
}

// Tampilkan pesan error jika ada
$pesan_error = '';
if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
    $pesan_error = "<div class='alert alert-danger'>Gagal memperbarui data: " . htmlspecialchars($_GET['error'] ?? 'Terjadi kesalahan.') . "</div>";
}
?>

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h4 class="m-0 font-weight-bold text-dark">
          <i class="fas fa-edit me-2"></i> Edit Kategori Surat
        </h4>
      </div>
      <div class="col-sm-6 text-right">
        <ol class="breadcrumb float-sm-right mb-0">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?halaman=kategori">Kategori</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="card card-solid shadow-sm border-0">
    <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
      <h5 class="m-0"><i class="fas fa-pen me-2"></i> Edit Data Kategori Surat</h5>
      <a href="index.php?halaman=tambahkategori" class="btn btn-light btn-sm">
        <i class="fas fa-plus-circle"></i> Tambah Baru
      </a>
    </div>

    <div class="card-body">
      <?= $pesan_error ?>

      <form action="db/dbkategori.php?proses=edit" method="POST" class="mt-2">
        <input type="hidden" name="id_kategori" value="<?= htmlspecialchars($data['id_kategori']) ?>">

        <div class="form-group mb-3">
          <label for="nama_kategori">Nama Kategori</label>
          <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                 placeholder="Masukkan nama kategori"
                 value="<?= htmlspecialchars($data['nama_kategori']) ?>" required>
          <small class="text-muted">Edit nama kategori surat sesuai kebutuhan.</small>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <a href="index.php?halaman=kategori" class="btn btn-secondary btn-sm me-2">
            <i class="fa fa-undo"></i> Batal
          </a>
          <button type="submit" class="btn btn-warning btn-sm">
            <i class="fa fa-save"></i> Update Data
          </button>
        </div>
      </form>
    </div>

    <div class="card-footer text-muted text-sm">
      <i class="fas fa-info-circle me-1"></i> Pastikan data kategori sudah benar sebelum disimpan.
    </div>
  </div>
</section>
